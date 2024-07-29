<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Aminities;
use App\Http\Controllers\Controller;

class LodgingRentalAminitiesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:amenities-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:amenities-create', ['only' => ['store']]);
        $this->middleware('permission:amenities-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:amenities-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $amenities = Aminities::where('is_delete', '0');

        if ($search_key) {
            $amenities = $amenities->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $amenities = $amenities->where('is_active', $search_status);
        }

        $amenities = $amenities->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.lodging_rental.amenity.table', compact('amenities', 'search_key', 'search_status'));
        }

        return view('admin.lodging_rental.amenity.index', compact('amenities', 'search_key', 'search_status'), ['page_name' => 'lodging Amenity List']);
    }

    public function create()
    {
        return view('admin.lodging_rental.amenity.create', ['page_name' => 'Add lodging Amenity']);
    }

    public function store(Request $request)
    {
        $amenity = new Aminities;
        $amenity->name = $request->name;
        if ($request->has('image')) {
            $amenity->image = imageUpload($request->file('image'), 'backend/admin/images/lodging_rental/amenities');
        }
        $amenity->is_active = $request->is_active;
       
        $amenity->save();

        return redirect()->route('admin.amenities.index')->with('success', 'lodging Amenity Added Successfully!');
    }

    public function show(Request $request, Aminities $amenity)
    {
        $amenity->is_active = $request->status;
        $amenity->save();
        if ($request->status == '1') {
            return back()->with('success', 'lodging Amenity Activited');
        } else {
            return back()->with('error', 'lodging Amenity Deactivited');
        }
    }

    public function edit(Aminities $amenity)
    {
        return view('admin.lodging_rental.amenity.edit', compact('amenity'), ['page_name' => 'Edit lodging Amenity']);
    }

    public function update(Request $request, Aminities $amenity)
    {
        $amenity->name = $request->name;
        if ($request->has('image')) {
            $amenity->image = imageUpload($request->file('image'), 'backend/admin/images/lodging_rental/amenities');
        }
        $amenity->is_active = $request->is_active;
        $amenity->save();

        return redirect()->route('admin.amenities.index')->with('success', 'lodging Amenity Updated Successfully!');
    }

    public function destroy(Aminities $amenity)
    {
        $amenity->is_delete = '1';
        $amenity->save();

        return back()->with('error', 'lodging Amenity Deleted Successfully!');
    }
}
