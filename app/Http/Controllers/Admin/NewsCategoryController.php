<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\NewsCategory;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:news-categories-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:news-categories-create', ['only' => ['store']]);
        $this->middleware('permission:news-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:news-categories-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $categories = NewsCategory::where('is_delete', '0');

        if ($search_key) {
            $categories = $categories->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $categories = $categories->where('is_active', $search_status);
        }

        $categories = $categories->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.news_management.category.table', compact('categories', 'search_key', 'search_status'));
        }

        return view('admin.news_management.category.index', compact('categories', 'search_key', 'search_status'), ['page_title' => 'News Category List']);
    }

    public function create()
    {
        return view('admin.news_management.category.create', ['page_title' => 'Add News Category']);
    }

    public function store(Request $request)
    {
        $news_category = new NewsCategory;
        $news_category->name = $request->name;
        $news_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $news_category->image = imageUpload($request->file('image'), 'backend/admin/images/news_management/categories');
        }
        $news_category->seo_title = $request->seo_title;
        $news_category->seo_description = $request->seo_description;
        $news_category->is_active = $request->is_active;
        $news_category->save();

        return redirect()->route('admin.news-categories.index')->with('success', 'News Category Added Successfully!');
    }

    public function show(Request $request, NewsCategory $news_category)
    {
        $news_category->is_active = $request->status;
        $news_category->save();
        if ($request->status == '1') {
            return back()->with('success', 'News Category Activited');
        } else {
            return back()->with('error', 'News Category Deactivited');
        }
    }

    public function edit(NewsCategory $news_category)
    {
        return view('admin.news_management.category.edit', compact('news_category'), ['page_title' => 'Edit News Category']);
    }

    public function update(Request $request, NewsCategory $news_category)
    {
        $news_category->name = $request->name;
        $news_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $news_category->image = imageUpload($request->file('image'), 'backend/admin/images/news_management/categories');
        }
        $news_category->seo_title = $request->seo_title;
        $news_category->seo_description = $request->seo_description;
        $news_category->is_active = $request->is_active;
        $news_category->save();

        return redirect()->route('admin.news-categories.index')->with('success', 'News Category Updated Successfully!');
    }

    public function destroy(NewsCategory $news_category)
    {
        $news_category->is_delete = '1';
        $news_category->save();

        return back()->with('error', 'News Category Deleted Successfully!');
    }
}
