<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\EventCategory;
use App\Http\Controllers\Controller;

class EventCategoryController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:event-categories-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:event-categories-create', ['only' => ['store']]);
        $this->middleware('permission:event-categories-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:event-categories-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $categories = EventCategory::where('is_delete', '0');

        if ($search_key) {
            $categories = $categories->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $categories = $categories->where('is_active', $search_status);
        }

        $categories = $categories->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.event_management.category.table', compact('categories', 'search_key', 'search_status'));
        }

        return view('admin.event_management.category.index', compact('categories', 'search_key', 'search_status'), ['page_title' => 'Event Category List']);
    }

    public function create()
    {
        return view('admin.event_management.category.create', ['page_title' => 'Add Event Category']);
    }

    public function store(Request $request)
    {
        $event_category = new EventCategory;
        $event_category->name = $request->name;
        $event_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $event_category->image = imageUpload($request->file('image'), 'backend/admin/images/event_management/categories');
        }
        $event_category->seo_title = $request->seo_title;
        $event_category->seo_description = $request->seo_description;
        $event_category->is_active = $request->is_active;
        $event_category->save();

        return redirect()->route('admin.event-categories.index')->with('success', 'Event Category Added Successfully!');
    }

    public function show(Request $request, EventCategory $event_category)
    {
        $event_category->is_active = $request->status;
        $event_category->save();
        if ($request->status == '1') {
            return back()->with('success', 'Event Category Activited');
        } else {
            return back()->with('error', 'Event Category Deactivited');
        }
    }

    public function edit(EventCategory $event_category)
    {
        return view('admin.event_management.category.edit', compact('event_category'), ['page_title' => 'Edit Event Category']);
    }

    public function update(Request $request, EventCategory $event_category)
    {
        $event_category->name = $request->name;
        $event_category->slug = Str::slug($request->name);
        if ($request->has('image')) {
            $event_category->image = imageUpload($request->file('image'), 'backend/admin/images/event_management/categories');
        }
        $event_category->seo_title = $request->seo_title;
        $event_category->seo_description = $request->seo_description;
        $event_category->is_active = $request->is_active;
        $event_category->save();

        return redirect()->route('admin.event-categories.index')->with('success', 'Event Category Updated Successfully!');
    }

    public function destroy(EventCategory $event_category)
    {
        $event_category->is_delete = '1';
        $event_category->save();

        return back()->with('error', 'Event Category Deleted Successfully!');
    }
}
