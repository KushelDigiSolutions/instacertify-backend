<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\VclassCategory;
use App\Http\Controllers\Controller;

class VclassCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:vclasses-categories-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:vclasses-categories-create', ['only' => ['store']]);
        $this->middleware('permission:vclasses-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:vclasses-categories-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $categories = VclassCategory::where('is_delete', '0');

        if ($search_key) {
            $categories = $categories->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $categories = $categories->where('is_active', $search_status);
        }

        $categories = $categories->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.vclass_management.category.table', compact('categories', 'search_key', 'search_status'));
        }

        return view('admin.vclass_management.category.index', compact('categories', 'search_key', 'search_status'), ['page_title' => 'vclasses Category List']);
    }

    public function create()
    {
        return view('admin.vclass_management.category.create', ['page_title' => 'Add vclasses Category']);
    }

    public function store(Request $request)
    {
        $event_category = new VclassCategory;
        $event_category->name = $request->name;
        $event_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $event_category->image = imageUpload($request->file('image'), 'backend/admin/images/vclass_management/categories');
        }
        $event_category->seo_title = $request->seo_title;
        $event_category->seo_description = $request->seo_description;
        $event_category->is_active = $request->is_active;
        $event_category->save();

        return redirect()->route('admin.vclasses-categories.index')->with('success', 'vclasses Category Added Successfully!');
    }

    public function show(Request $request, VclassCategory $vclassCategory)
    {
        $value =  $request->path();
        $value = str_replace("admin/vclasses-categories/","",$value);
        $value = str_replace("?status=0","",$value);
        $value = str_replace("?status=1","",$value);
        //dd($value);
        $vclass_category = $vclassCategory->get()->where('id',$value)->first();
        $vclass_category->is_active = $request->status;
        $vclass_category->save();
        if ($request->status == '1') {
            return back()->with('success', 'vclasses Category Activited');
        } else {
            return back()->with('error', 'vclasses Category Deactivited');
        }
    }

    public function edit(Request $request,VclassCategory $vclassCategory)
    {   
        $value =  $request->path();
        $value = str_replace("admin/vclasses-categories/","",$value);
        $value = str_replace("/edit","",$value);
        
        $vclass_category = $vclassCategory->get()->where('id',$value)->first();
      //  dd($vclass_category);
        return view('admin.vclass_management.category.edit', compact('vclass_category'), ['page_title' => 'Edit vclasses Category']);
    }

    public function update(Request $request, VclassCategory $vclassCategory)
    {
        $value =  $request->path();
        $value = str_replace("admin/vclasses-categories/","",$value);
        //dd($value);
        $event_category = $vclassCategory->get()->where('id',$value)->first();
        $event_category->name = $request->name;
        $event_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $event_category->image = imageUpload($request->file('image'), 'backend/admin/images/vclass_management/categories');
        }
        $event_category->seo_title = $request->seo_title;
        $event_category->seo_description = $request->seo_description;
        $event_category->is_active = $request->is_active;
        $event_category->save();

        return redirect()->route('admin.vclasses-categories.index')->with('success', 'vclasses Category Updated Successfully!');
    }

    public function destroy(Request $request, VclassCategory $vclassCategory)
    {
        $value =  $request->path();
        $value = str_replace("admin/vclasses-categories/","",$value);
        $value = str_replace("?status=0","",$value);
        $value = str_replace("?status=1","",$value);
        //dd($value);
        $vclass_category = $vclassCategory->get()->where('id',$value)->first();
        $vclass_category->is_delete = '1';
        $vclass_category->save();

        return back()->with('error', 'vclasses Category Deleted Successfully!');
    }
}
