<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\EquipmentCategory;
use App\Http\Controllers\Controller;

class EquipmentRentalCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:equipment-categories-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:equipment-categories-create', ['only' => ['store']]);
        $this->middleware('permission:equipment-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:equipment-categories-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $categories = EquipmentCategory::where('is_delete', '0');

        if ($search_key) {
            $categories = $categories->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $categories = $categories->where('is_active', $search_status);
        }

        $categories = $categories->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.equipment_rental.category.table', compact('categories', 'search_key', 'search_status'));
        }

        return view('admin.equipment_rental.category.index', compact('categories', 'search_key', 'search_status'), ['page_title' => 'equipment Category List']);
    }

    public function create()
    {
        return view('admin.equipment_rental.category.create', ['page_title' => 'Add equipment Category']);
    }

    public function store(Request $request)
    {
        $equipment_category = new EquipmentCategory;
        $equipment_category->name = $request->name;
        $equipment_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $equipment_category->image = imageUpload($request->file('image'), 'backend/admin/images/equipment_management/categories');
        }
        $equipment_category->seo_title = $request->seo_title;
        $equipment_category->seo_description = $request->seo_description;
        $equipment_category->is_active = $request->is_active;
        $equipment_category->save();

        return redirect()->route('admin.equipment-categories.index')->with('success', 'equipment Category Added Successfully!');
    }

    public function show(Request $request, EquipmentCategory $equipment_category)
    {
        $equipment_category->is_active = $request->status;
        $equipment_category->save();
        if ($request->status == '1') {
            return back()->with('success', 'equipment Category Activited');
        } else {
            return back()->with('error', 'equipment Category Deactivited');
        }
    }

    public function edit(EquipmentCategory $equipment_category)
    {
        return view('admin.equipment_rental.category.edit', compact('equipment_category'), ['page_title' => 'Edit equipment Category']);
    }

    public function update(Request $request, EquipmentCategory $equipment_category)
    {
        $equipment_category->name = $request->name;
        $equipment_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $equipment_category->image = imageUpload($request->file('image'), 'backend/admin/images/equipment_management/categories');
        }
        $equipment_category->seo_title = $request->seo_title;
        $equipment_category->seo_description = $request->seo_description;
        $equipment_category->is_active = $request->is_active;
        $equipment_category->save();

        return redirect()->route('admin.equipment-categories.index')->with('success', 'equipment Category Updated Successfully!');
    }

    public function destroy(EquipmentCategory $equipment_category)
    {
        $equipment_category->is_delete = '1';
        $equipment_category->save();

        return back()->with('error', 'equipment Category Deleted Successfully!');
    }
}
