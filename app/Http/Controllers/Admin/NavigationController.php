<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Page;
use Illuminate\Http\Request;
use App\Models\Admin\Navigation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:menu-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:menu-create', ['only' => ['store']]);
        $this->middleware('permission:menu-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:menu-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
        $list = Navigation::orderBy('id', 'desc');
        if ($search_key) {
            $list = $list->where(function ($query) use ($search_key) {
                $query->where('title', 'like', '%' . $search_key . '%');
            });
        }
        $navigations = $list->paginate(10);
        if ($request->ajax()) {
            return view('admin.content_management.navigation.table', compact('navigations', 'search_key', 'search_status'));
        }

        return view('admin.content_management.navigation.index', compact('navigations'), ['page_title' => 'Menu List']);
    }

    public function create()
    {
        return view('admin.content_management.navigation.create');
    }

    public function store(Request $request)
    {
        //return $request->all();
        $navigation = new Navigation;
        $navigation->added_by = Auth::guard('admin')->user()->id;
        $navigation->title = $request->title;
        $navigation->background_color = $request->background_color;
        $navigation->text_link_color = $request->text_link_color;
        $navigation->hover_background_color = $request->hover_background_color;
        $navigation->link_hover_color = $request->link_hover_color;
        $navigation->parent_text_color = $request->parent_text_color;
        $navigation->parent_text_hover_color = $request->parent_text_hover_color;
        $navigation->items = $request->storeObjectItems;
        $navigation->is_published = $request->is_active;
        $navigation->save();

        return redirect()->route('admin.navigations.index')->with('success', 'Menu Added Successfully!');
    }

    public function edit($id)
    {
        $navigation = Navigation::find($id);
        return view('admin.content_management.navigation.edit', compact('navigation'));
    }

    public function update(Request $request, $id)
    {
        //return $request->all();
        $navigation = Navigation::find($id);
        $navigation->title = $request->title;
        $navigation->background_color = $request->background_color;
        $navigation->text_link_color = $request->text_link_color;
        $navigation->hover_background_color = $request->hover_background_color;
        $navigation->link_hover_color = $request->link_hover_color;
        $navigation->parent_text_color = $request->parent_text_color;
        $navigation->parent_text_hover_color = $request->parent_text_hover_color;
        $navigation->items = $request->storeObjectItems;
        $navigation->is_published = $request->is_active;
        $navigation->save();

        return redirect()->route('admin.navigations.index')->with('success', 'Menu Added Successfully!');
    }

    public function destroy(Navigation $navigation)
    {
        $check = Page::where('navigation_id', $navigation->id)->first();
        if ($check) {
            return back()->with('error', 'Menu is set in pages!');
        } else {
            $navigation->delete();
            return back()->with('error', 'Menu Deleted Successfully!');
        }
    }

}
