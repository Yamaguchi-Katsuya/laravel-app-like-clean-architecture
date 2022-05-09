<?php

namespace App\Http\UseCases\Admin\Article;

use App\Http\Requests\Admin\Article\StoreRequest;
use App\Http\Services\FileServiceInterface AS FileService;
use App\Models\Article;
use Exception;
use Illuminate\Support\Facades\DB;

class StoreAction
{
    public function __construct(
        private FileService $fileService
    ) {}

    /**
     * @param Article $article
     * @param StoreRequest $request
     * @return bool
     */
    public function invoke(Article $article, StoreRequest $request): bool
    {
        DB::beginTransaction();
        try {
            $article->save();
            $article->tags()->sync($request->tags ?? []);

            $articleDirPath = "article/{$article->id}";
            $putResult = $this->fileService->putFileAs($articleDirPath, $request->main_image, $article->main_image);
            if (!$putResult) throw new Exception();

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
