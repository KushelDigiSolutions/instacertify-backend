<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Models\Admin\Page;
use App\Models\Admin\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:footer-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:footer-create', ['only' => ['store']]);
        $this->middleware('permission:footer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:footer-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
        $list = Footer::orderBy('id', 'desc');
        if ($search_key) {
            $list = $list->where(function ($query) use ($search_key) {
                $query->where('title', 'like', '%' . $search_key . '%');
            });
        }
        $footers = $list->paginate(10);
        if ($request->ajax()) {
            return view('admin.content_management.footer.table', compact('footers', 'search_key', 'search_status'));
        }

        return view('admin.content_management.footer.index', compact('footers'), ['page_title' => 'Footer List']);
    }

    public function create()
    {
        return view('admin.content_management.footer.create');
    }

    public function edit(Footer $footer)
    {
        return view('admin.content_management.footer.edit', compact('footer'), ['page_title' => 'Edit Footer']);
    }

    public function store(Request $request)
    {
        //return $request->all();
        $footer = new Footer;
        $footer->added_by = Auth::guard('admin')->user()->id;
        $footer->title = $request->title;
        $footer->background_color = $request->txtColorCode;
        $footer->global_title = $request->global_title_text;
        $footer->sub_title = $request->sub_title;
        $footer->parent_text_color = $request->parent_text_color;
        $footer->parent_text_hover_color = $request->parent_text_hover_color;
        if ($request->footer_logo) {
            $footer->footer_logo = imageUpload($request->file('footer_logo'), 'backend/admin/images/footer');
        }
        $footer->items = json_encode($request->storeObjectItems);
        $footer->is_active = $request->is_active;
        $footer->save();

        return redirect()->route('admin.footers.index')->with('success', 'Footer Added Successfully!');
    }

    public function update(Request $request, Footer $footer)
    {

        $footer->title = $request->title;
        $footer->background_color = $request->txtColorCode;
        $footer->global_title = $request->global_title_text;
        $footer->sub_title = $request->sub_title;
        $footer->parent_text_color = $request->parent_text_color;
        $footer->parent_text_hover_color = $request->parent_text_hover_color;
        if ($request->footer_logo) {
            $footer->footer_logo = imageUpload($request->file('footer_logo'), 'backend/admin/images/footer');
        }
        $footer->items = json_encode($request->storeObjectItems);
        $footer->is_active = $request->is_active;
        $footer->save();

        return redirect()->route('admin.footers.index')->with('success', 'Footer Updated Successfully!');
    }
    public function show($id)
    {
        $footer = Footer::find($id);

        // foreach(json_decode(json_decode($footer->items)) as $item){
        //     return $item;
        // }
        return view('admin.content_management.footer.preview', compact('footer'));
    }
    public function preview($id)
    {
        $footer = Footer::find($id);

        // foreach(json_decode(json_decode($footer->items)) as $item){
        //     return $item;
        // }
        return view('admin.content_management.footer.preview', compact('footer'));
    }
    public function destroy(Footer $footer)
    {
        $check = Page::where('footer_id', $footer->id)->first();
        if ($check) {
            return back()->with('error', 'Footer is set in pages!');
        } else {
            $footer->delete();
            return back()->with('error', 'Footer Deleted Successfully!');
        }
    }
}
