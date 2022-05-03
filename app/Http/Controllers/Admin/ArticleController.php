<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Article\StoreRequest;
use App\Http\Requests\Admin\Article\UpdateRequest;
use App\Http\UseCases\Admin\Article\CreateAction;
use App\Http\UseCases\Admin\Article\DestroyAction;
use App\Http\UseCases\Admin\Article\EditAction;
use App\Http\UseCases\Admin\Article\IndexAction;
use App\Http\UseCases\Admin\Article\ShowAction;
use App\Http\UseCases\Admin\Article\StoreAction;
use App\Http\UseCases\Admin\Article\UpdateAction;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexAction $action
     * @return View|Factory
     */
    public function index(IndexAction $action): View|Factory
    {
        $articles = $action->invoke();
        return view('admin.Article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CreateAction $action
     * @return View|Factory
     */
    public function create(CreateAction $action): View|Factory
    {
        $formData = $action->invoke();
        return view('admin.Article.create', compact('formData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param StoreAction $action
     * @return RedirectResponse|false
     */
    public function store(StoreRequest $request, StoreAction $action): RedirectResponse|false
    {
        $article = $request->makeArticle();
        try {
            $action->invoke($article, $request->tags);
            return redirect()->route('article.index');
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param ShowAction $action
     * @param  int  $id
     * @return View|Factory
     */
    public function show(ShowAction $action, int $id): View|Factory
    {
        $article = $action->invoke($id);
        return view('admin.Article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EditAction $action
     * @param  int  $id
     * @return View|Factory
     */
    public function edit(EditAction $action, int $id): View|Factory
    {
        $formData = $action->invoke($id);
        return view('admin.Article.edit', compact('formData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRequest  $request
     * @param  UpdateAction  $action
     * @param  int  $id
     * @return RedirectResponse|false
     */
    public function update(UpdateRequest $request, UpdateAction $action, int $id): RedirectResponse|false
    {
        $article = $request->makeArticle($id);
        try {
            $action->invoke($article);
            return redirect()->route('article.show', $id);
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAction $action
     * @param  int  $id
     * @return RedirectResponse|false
     */
    public function destroy(DestroyAction $action, int $id): RedirectResponse|false
    {
        try {
            $action->invoke($id);
            return redirect()->route('article.index');
        } catch (Exception $e) {
            return false;
        }
    }
}
