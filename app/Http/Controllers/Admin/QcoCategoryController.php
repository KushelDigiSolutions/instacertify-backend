<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\QcoCategory;
use App\Http\Controllers\Controller;

class QcoCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:qco-categories-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:qco-categories-create', ['only' => ['store']]);
        $this->middleware('permission:qco-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:qco-categories-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $categories = QcoCategory::where('is_delete', '0');

        if ($search_key) {
            $categories = $categories->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $categories = $categories->where('is_active', $search_status);
        }

        $categories = $categories->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.qco_management.category.table', compact('categories', 'search_key', 'search_status'));
        }

        return view('admin.qco_management.category.index', compact('categories', 'search_key', 'search_status'), ['page_title' => 'qco Category List']);
    }

    public function create()
    {
        return view('admin.qco_management.category.create', ['page_title' => 'Add qco Category']);
    }

    public function store(Request $request)
    {
        $qco_category = new QcoCategory;
        $qco_category->name = $request->name;
        $qco_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $qco_category->image = imageUpload($request->file('image'), 'backend/admin/images/qco_management/categories');
        }
        $qco_category->seo_title = $request->seo_title;
        $qco_category->seo_description = $request->seo_description;
        $qco_category->is_active = $request->is_active;
        $qco_category->save();

        return redirect()->route('admin.qco-categories.index')->with('success', 'qco Category Added Successfully!');
    }

    public function show(Request $request, QcoCategory $qco_category)
    {
        $qco_category->is_active = $request->status;
        $qco_category->save();
        if ($request->status == '1') {
            return back()->with('success', 'qco Category Activited');
        } else {
            return back()->with('error', 'qco Category Deactivited');
        }
    }

    public function edit(QcoCategory $qco_category)
    {
        return view('admin.qco_management.category.edit', compact('qco_category'), ['page_title' => 'Edit qco Category']);
    }

    public function update(Request $request, QcoCategory $qco_category)
    {
        $qco_category->name = $request->name;
        $qco_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $qco_category->image = imageUpload($request->file('image'), 'backend/admin/images/qco_management/categories');
        }
        $qco_category->seo_title = $request->seo_title;
        $qco_category->seo_description = $request->seo_description;
        $qco_category->is_active = $request->is_active;
        $qco_category->save();

        return redirect()->route('admin.qco-categories.index')->with('success', 'qco Category Updated Successfully!');
    }

    public function destroy(QcoCategory $qco_category)
    {
        $qco_category->is_delete = '1';
        $qco_category->save();

        return back()->with('error', 'qco Category Deleted Successfully!');
    }
}
 