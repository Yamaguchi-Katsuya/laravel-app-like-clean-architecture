<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Http\UseCases\Admin\Tag\DestroyAction;
use App\Http\UseCases\Admin\Tag\EditAction;
use App\Http\UseCases\Admin\Tag\IndexAction;
use App\Http\UseCases\Admin\Tag\ShowAction;
use App\Http\UseCases\Admin\Tag\StoreAction;
use App\Http\UseCases\Admin\Tag\UpdateAction;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexAction $action
     * @return View|Factory
     */
    public function index(IndexAction $action): View|Factory
    {
        $tags = $action->invoke();
        return view('admin.Tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View|Factory
     */
    public function create(): View|Factory
    {
        return view('admin.Tag.create');
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
        $tag = $request->makeTag();
        try {
            $action->invoke($tag);
            return redirect()->route('tag.index');
        } catch (Exception $e) {
            echo $e->getMessage();
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
        $tag = $action->invoke($id);
        return view('admin.Tag.show', compact('tag'));
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
        return view('admin.Tag.edit', compact('formData'));
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
            return redirect()->route('tag.show', $id);
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
            return redirect()->route('tag.index');
        } catch (Exception $e) {
            return false;
        }
    }
}
