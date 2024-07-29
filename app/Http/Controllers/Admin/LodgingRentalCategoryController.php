<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\LodgingCategory;
use App\Http\Controllers\Controller;

class LodgingRentalCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:lodging-categories-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:lodging-categories-create', ['only' => ['store']]);
        $this->middleware('permission:lodging-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:lodging-categories-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $categories = LodgingCategory::where('is_delete', '0');

        if ($search_key) {
            $categories = $categories->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $categories = $categories->where('is_active', $search_status);
        }

        $categories = $categories->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.lodging_rental.category.table', compact('categories', 'search_key', 'search_status'));
        }

        return view('admin.lodging_rental.category.index', compact('categories', 'search_key', 'search_status'), ['page_title' => 'lodging Category List']);
    }

    public function create()
    {
        return view('admin.lodging_rental.category.create', ['page_title' => 'Add lodging Category']);
    }

    public function store(Request $request)
    {
        $event_category = new LodgingCategory;
        $event_category->name = $request->name;
        $event_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $event_category->image = imageUpload($request->file('image'), 'backend/admin/images/lodging_rental/categories');
        }
        $event_category->seo_title = $request->seo_title;
        $event_category->seo_description = $request->seo_description;
        $event_category->is_active = $request->is_active;
        $event_category->save();

        return redirect()->route('admin.lodging-categories.index')->with('success', 'lodging Category Added Successfully!');
    }

    public function show(Request $request, LodgingCategory $lodgingCategory)
    {
        $lodgingCategory->is_active = $request->status;
        $lodgingCategory->save();
        if ($request->status == '1') {
            return back()->with('success', 'lodging Category Activited');
        } else {
            return back()->with('error', 'lodging Category Deactivited');
        }
    }

    public function edit(LodgingCategory $lodging_category)
    {
        return view('admin.lodging_rental.category.edit', compact('lodging_category'), ['page_title' => 'Edit lodging Category']);
    }

    public function update(Request $request, LodgingCategory $lodgingCategory)
    {
        //dd($lodgingCategory);
        $lodgingCategory->name = $request->name;
        $lodgingCategory->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $lodgingCategory->image = imageUpload($request->file('image'), 'backend/admin/images/lodging_rental/categories');
        }
        $lodgingCategory->seo_title = $request->seo_title;
        $lodgingCategory->seo_description = $request->seo_description;
        $lodgingCategory->is_active = $request->is_active;
        $lodgingCategory->save();

        return redirect()->route('admin.lodging-categories.index')->with('success', 'lodging Category Updated Successfully!');
    }

    public function destroy(LodgingCategory $lodgingCategory)
    {
        $lodgingCategory->is_delete = '1';
        $lodgingCategory->save();

        return back()->with('error', 'lodging Category Deleted Successfully!');
    }
}
