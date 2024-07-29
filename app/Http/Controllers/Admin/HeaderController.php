<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Page;
use App\Models\Admin\Header;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HeaderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:header-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:header-create', ['only' => ['store']]);
        $this->middleware('permission:header-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:header-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
        $list = Header::orderBy('id', 'desc');
        if ($search_key) {
            $list = $list->where(function ($query) use ($search_key) {
                $query->where('title', 'like', '%' . $search_key . '%');
            });
        }
        $headers = $list->paginate(10);
        if ($request->ajax()) {
            return view('admin.content_management.header.table', compact('headers', 'search_key', 'search_status'));
        }
        return view('admin.content_management.header.index', compact('headers'), ['page_title' => 'Header List']);
    }

    public function create()
    {
        return view('admin.content_management.header.create', ['page_title' => 'Add Header']);
    }

    public function store(Request $request)
    {
        $header = new Header;
        $header->added_by = Auth::guard('admin')->user()->id;
        $header->title = $request->title;
        if ($request->background_color) {
            $header->background_color = $request->background_color;
        }
        if ($request->background_image) {
            $header->background_image = imageUpload($request->file('background_image'), 'backend/admin/images/header');
        }
        $header->text = $request->text;
        if ($request->default_logo) {
            $header->default_logo = imageUpload($request->file('default_logo'), 'backend/admin/images/header');
        }
        $header->is_published = $request->is_published;
        $header->save();

        return redirect()->route('admin.headers.index')->with('success', 'Header Added Successfully!');
    }

    public function edit(Header $header)
    {
        return view('admin.content_management.header.edit', compact('header'), ['page_title' => 'Edit Header']);
    }

    public function update(Request $request, Header $header)
    {
        $header->title = $request->title;
        if ($request->background_color) {
            $header->background_color = $request->background_color;
        } else {
            $header->background_color = null;
        }
        if ($request->background_image) {
            $header->background_image = imageUpload($request->file('background_image'), 'backend/admin/images/header');
        } else {
            $header->background_image = null;
        }
        $header->text = $request->text;
        if ($request->default_logo) {
            $header->default_logo = imageUpload($request->file('default_logo'), 'backend/admin/images/header');
        }
        $header->is_published = $request->is_published;
        $header->save();

        return redirect()->route('admin.headers.index')->with('success', 'Header Updated Successfully!');
    }

    public function show(Request $request, Header $header)
    {
        $header->is_published = $request->status;
        $header->save();

        return back()->with('success', 'Header Status Changed Successfully!');
    }

    public function destroy(Header $header)
    {
        $check = Page::where('header_id', $header->id)->first();
        if ($check) {
            return back()->with('error', 'Header is set in pages!');
        } else {
            $header->delete();
            return back()->with('error', 'Header Deleted Successfully!');
        }
    }

    public function preview($id)
    {
        $header = Header::find($id);

        return view('admin.content_management.header.preview', compact('header'), ['page_title' => 'Header Preview']);
    }

}
