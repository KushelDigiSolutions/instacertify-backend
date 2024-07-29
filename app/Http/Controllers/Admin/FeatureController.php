<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Features;
use App\Http\Controllers\Controller;

class FeatureController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:features-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:features-create', ['only' => ['store']]);
        $this->middleware('permission:features-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:features-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $features = Features::where('is_delete', '0');

        if ($search_key) {
            $features = $features->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $features = $features->where('is_active', $search_status);
        }

        $features = $features->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.lodging_rental.feature.table', compact('features', 'search_key', 'search_status'));
        }

        return view('admin.lodging_rental.feature.index', compact('features', 'search_key', 'search_status'), ['page_name' => 'lodging Feature List']);
    }

    public function create()
    {
        return view('admin.lodging_rental.feature.create', ['page_name' => 'Add lodging Feature']);
    }

    public function store(Request $request)
    {
        $feature = new Features;
        $feature->name = $request->name;
        if ($request->has('image')) {
            $feature->image = imageUpload($request->file('image'), 'backend/admin/images/lodging_rental/feature');
        }
        $feature->is_active = $request->is_active;
       
        $feature->save();

        return redirect()->route('admin.features.index')->with('success', 'lodging Feature Added Successfully!');
    }

    public function show(Request $request, Features $feature)
    {
        $feature->is_active = $request->status;
        $feature->save();
        if ($request->status == '1') {
            return back()->with('success', 'lodging Feature Activited');
        } else {
            return back()->with('error', 'lodging Feature Deactivited');
        }
    }

    public function edit(Features $feature)
    {
        return view('admin.lodging_rental.feature.edit', compact('feature'), ['page_name' => 'Edit lodging Feature']);
    }

    public function update(Request $request, Features $feature)
    {
        $feature->name = $request->name;
        if ($request->has('image')) {
            $feature->image = imageUpload($request->file('image'), 'backend/admin/images/lodging_rental/feature');
        }
        $feature->is_active = $request->is_active;
        $feature->save();

        return redirect()->route('admin.features.index')->with('success', 'lodging Feature Updated Successfully!');
    }

    public function destroy(Features $feature)
    {
        $feature->is_delete = '1';
        $feature->save();

        return back()->with('error', 'lodging Feature Deleted Successfully!');
    }
}
