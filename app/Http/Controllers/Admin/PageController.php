<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Page;
use App\Models\Admin\Footer;
use App\Models\Admin\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Navigation;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:pages-list', ['only' => ['index']]);
        $this->middleware('permission:pages-create', ['only' => ['store']]);
        $this->middleware('permission:pages-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pages-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
        $name_sort = $request->name_sort;
        $date_sort = $request->date_sort;
        if ($name_sort) {
            $users = Page::orderBy('title', $name_sort);
        } elseif ($date_sort) {
            $users = Page::orderBy('created_at', $date_sort);
        } else {
            $users = Page::orderBy('created_at', 'desc');
        }


        if ($search_key) {
            $users = $users->where(function ($query) use ($search_key) {
                $query->where('title', 'like', '%' . $search_key . '%');
            });
        }

        $lists = $users->get();

        if ($request->ajax()) {
            return view('admin.page.table', compact('lists', 'search_key', 'search_status', 'date_sort', 'name_sort'));
        }

        return view('admin.page.page_three', compact('lists', 'search_key', 'search_status', 'name_sort', 'date_sort'), ['page_title' => 'Page List']);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255|unique:pages,title',
        ]);
        if ($validator->fails()) {

            return redirect()->route('admin.pages.index')->with('error', 'The title has already been taken.');
        }
        $page = new Page;
        $page->created_by = auth()->user()->id;
        $string = file_get_contents(public_path("data.txt"));
        $page->html = $string;
        $page->title = $request->title;
        $page->save();

        return redirect()->route('admin.pages.index')->with('success', 'Page Added Successfully!');
    }

    public function edit($id)
    {

        $data['headers'] = Header::all();
        $data['footers'] = Footer::all();
        $data['navigations'] = Navigation::all();
        $data['page'] = Page::find($id);
        return $data;
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'header_id' => 'required',
            'footer_id' => 'required',
            'navigation_id' => 'required',
            'edit_page_id' => 'required',
        ]);
        $page = Page::find($request->edit_page_id);
        if ($page->custom_url != $request->custom_url) {
            if ($request->custom_url) {
                $validator = Validator::make($request->all(), [
                    'custom_url' => 'max:255|unique:pages,custom_url',
                ]);
                if ($validator->fails()) {

                    return redirect()->route('admin.pages.index')->with('error', 'The Custom Url has already been taken.');
                }
            }
        }
        if ($page->title != $request->title) {
            if ($request->title) {
                $validator = Validator::make($request->all(), [
                    'title' => 'required|max:255|unique:pages,title',
                ]);
                if ($validator->fails()) {

                    return redirect()->route('admin.pages.index')->with('error', 'The Page Name has already been taken.');
                }
            }
        }
        $page->title = $request->title;
        $page->header_id = $request->header_id;
        $page->footer_id = $request->footer_id;
        $page->navigation_id = $request->navigation_id;
        $page->custom_url = $request->custom_url;
        $page->seo_title = $request->seo_title;
        $page->seo_description = $request->seo_description;
        $page->seo_keywords = $request->seo_keywords;
        $page->save();
        return redirect()->route('admin.pages.index')->with('success', 'Page Updated Successfully!');
    }

    public function destroy($id)
    {
        $check = Page::where('id', $id)->where('is_homepage', 1)->first();
        if ($check) {
            return back()->with('error', 'Error to deleting this page!');
        } else {
            Page::where('id', $id)->delete();
            return back()->with('error', 'Page Deleted Successfully!');
        }

    }

    public function pageBuild(Request $request, $id)
    {
        if (!$id) {
            return redirect()->route('admin.pages.index')->with('success', 'Page Not Found!');
        }
        $data = Page::find($id);
        $string = $data->html;
        return view('admin.page.page', compact('string'));
    }

    public function pageBuilder(Request $request)
    {
        if (!$request->id) {
            return redirect()->route('admin.pages.index')->with('success', 'Page Not Found!');
        }
        $string = $request->id;
        return view('admin.content_management.creator.page_builder', compact('string'));
    }


    public function pageBuilderSubmit(Request $request)
    {
        $dataa = Page::find($request->id);
        $dataa->html = $request->html;
        $dataa->save();
        echo "File saved '$dataa->title'";
    }

    public function status($id, $status)
    {
        $user = Page::find($id);
        $user->is_published = $status;
        $user->save();

        if ($status == '0') {
            return back()->with('info', 'Page saved in Draft.');
        } else {
            return back()->with('success', 'Page Published Successfully.');
        }
    }

    public function statusHome($id, $status)
    {
        $user = Page::find($id);
        $user->is_homepage = $status;
        $user->save();


        if ($status == '1') {
            Page::where('id', '!=', $id)->update(['is_homepage' => '0']);
            return back()->with('success', 'Page set to Homepage.');
        } else {
            return back()->with('info', 'Page Removed from homepage.');
        }
    }
    public function pageDuplicate(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);
        $page = Page::find($request->id);
        if ($page) {
            $validator = Validator::make($request->all(), [
                'duplicate' => 'required|max:255|unique:pages,title',
            ]);
            if ($validator->fails()) {

                return redirect()->route('admin.pages.index')->with('error', 'The Page Name has already been taken.');
            } else {
                $duplicatepage = new Page;
                $duplicatepage->created_by = auth()->user()->id;
                $duplicatepage->title = $request->duplicate;
                $duplicatepage->header_id = $page->header_id;
                $duplicatepage->footer_id = $page->footer_id;
                $duplicatepage->navigation_id = $page->navigation_id;
                $duplicatepage->html = $page->html;
                $duplicatepage->save();
                return redirect()->route('admin.pages.index')->with('success', 'Page Added Successfully!');
            }
        }
        return redirect()->route('admin.pages.index')->with('error', 'Page Not Found!');
    }
}
