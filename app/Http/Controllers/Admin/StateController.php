<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\States;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:states-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:states-create', ['only' => ['store']]);
        $this->middleware('permission:states-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:states-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;

        $states = States::where('is_delete', '0');

        if ($search_key) {
            $states = $states->where('name', 'like', '%' . $search_key . '%');
        }
        if ($search_status == '1' || $search_status == '0') {
            $states = $states->where('is_active', $search_status);
        }

        $states = $states->orderBy('name', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.lodging_rental.state.table', compact('states', 'search_key', 'search_status'));
        }

        return view('admin.lodging_rental.state.index', compact('states', 'search_key', 'search_status'), ['page_name' => 'lodging state List']);
    }

    public function create()
    {
        return view('admin.lodging_rental.state.create', ['page_name' => 'Add lodging state']);
    }

    public function store(Request $request)
    {
        $state = new States;
        $state->code = $request->code;
        $state->name = $request->name;
        $state->country = $request->country;
      
        $state->is_active = $request->is_active;
       
        $state->save();

        return redirect()->route('admin.states.index')->with('success', 'lodging state Added Successfully!');
    }

    public function show(Request $request, States $state)
    {
        $state->is_active = $request->status;
        $state->save();
        if ($request->status == '1') {
            return back()->with('success', 'lodging state Activited');
        } else {
            return back()->with('error', 'lodging state Deactivited');
        }
    }

    public function edit(States $state)
    {
        return view('admin.lodging_rental.state.edit', compact('state'), ['page_name' => 'Edit lodging state']);
    }

    public function update(Request $request, States $state)
    {
        $state->code = $request->code;
        $state->name = $request->name;
        $state->country = $request->country;
        
        $state->is_active = $request->is_active;
        $state->save();

        return redirect()->route('admin.states.index')->with('success', 'lodging state Updated Successfully!');
    }

    public function destroy(States $state)
    {
        $state->is_delete = '1';
        $state->save();

        return back()->with('error', 'lodging state Deleted Successfully!');
    }
}
