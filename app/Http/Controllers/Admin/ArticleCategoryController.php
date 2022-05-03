<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleCategory\StoreRequest;
use App\Http\UseCases\Admin\ArticleCategory\IndexAction;
use App\Http\UseCases\Admin\ArticleCategory\StoreAction;
use App\Models\ArticleCategory;
use Exception;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articleCategories = ArticleCategory::all();
        return view('admin.ArticleCategory.index', compact('articleCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.ArticleCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @param StoreAction $storeAction
     * @param IndexAction $indexAction
     * @return Response
     */
    public function store(StoreRequest $request, StoreAction $storeAction, IndexAction $indexAction)
    {
        $articleCategory = $request->makeArticleCategory();
        try {
            $storeAction->invoke($articleCategory);
            $articleCategories = $indexAction->invoke();
            return view('admin.ArticleCategory.index', compact('articleCategories'));
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
