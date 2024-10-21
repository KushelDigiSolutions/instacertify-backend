<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\News;
use App\Http\Controllers\Controller;
use \Validator;
use Carbon\Carbon;
use App\Models\Admin\Location;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\NewsCategory;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:news-list', ['only' => ['index', 'show']]);
        $this->middleware('permission:news-create', ['only' => ['store']]);
        $this->middleware('permission:news-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:news-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_status = $request->search_status;
		
  
		$news = News::where('is_delete', '0');
        if ($search_key) {
            $news = $news->where('title', 'like', '%' . $search_key . '%');
        } 
        if ($search_status == '1' || $search_status == '0') {
            $news = $news->where('is_active', $search_status);
        }

        $news = $news->orderBy('title', 'asc')->paginate(10);

        if ($request->ajax()) {
            return view('admin.news_management.news.table', compact('news', 'search_key', 'search_status'));
        }

		$news = News::where('is_delete', '0')->orderBy('id', 'desc')->paginate(10);
        return view('admin.news_management.news.index', compact('news', 'search_key', 'search_status'), ['page_title' => 'News List']);
    }

    public function create()
    {
        $news_categories = NewsCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();

        return view('admin.news_management.news.create', compact('news_categories'), ['page_title' => 'Add News']);
    }

    public function store(Request $request)
    {
        $news = new News;
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;
        $imag = null;
        $images = array();
        foreach ($request->file('images') as $image) {
            array_push($images, imageUpload($image, 'backend/admin/images/news_management/news'));
        }
        if(!empty($images[0])){
            $imag = $images[0];
        }
        $news->images = $images;
        $news->category_ids = $request->category_ids;
        $news->seo_title = $request->seo_title;
        $news->user_id = Auth::id();
        $news->seo_description = $request->seo_description;
        if ($news->save()) {
         
        }

        return redirect()->route('admin.news.index')->with('success', 'News Added Successfully!');
    }

    public function show(Request $request, News $news)
    {
        return view('admin.news_management.news.show', compact('news'), ['page_title' => 'Show News']);
    }

    public function edit(News $news)
    {
        $news_categories = NewsCategory::select('id', 'name')->where('is_delete', '0')->orderBy('name', 'asc')->get();

        return view('admin.news_management.news.edit', compact('news', 'news_categories'), ['page_title' => 'Edit News']);
    }

    public function update(Request $request, News $news)
    {
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;
        $imag = null;
        
        if ($request->has('images')) {
            $images = array();
            foreach ($request->file('images') as $image) {
                array_push($images, imageUpload($image, 'backend/admin/images/news_management/news'));
                $imag = $image;
            }
            if(!empty($request->oldImages)){
                $news->images = array_merge($request->oldImages,$images);
            }else{
                $news->images = $images;
            }
          
        }
        $news->category_ids = $request->category_ids;
        $news->seo_title = $request->seo_title;
        $news->seo_description = $request->seo_description;
        if ($news->save() && !empty($request->tickettype)) {
          
        }

        return redirect()->route('admin.news.index')->with('success', 'News Updated Successfully!');
    }

    public function destroy(News $news)
    {
        $news->is_delete = '1';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.bigcommerce.com/stores/suzeuussqe/v3/catalog/products/" . $news->bigcommerce_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => [
                "Accept: application/json",
                "Content-Type: application/json",
                "X-Auth-Token: b4rd5x5aimj4zwv6arra5bdle8qoi8w"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {

        }

        $news->save();

        return back()->with('error', 'News Deleted Successfully!');
    }

    public function toggleActive($id)
    {
        $news = News::findOrFail($id);
        $news->update(['is_active' => !$news->is_active]);

        return response()->json(['status' => 'success', 'is_active' => $news->is_active , 'id' => $news->id]);
    }

    public function checkProductName(Request $request)
    {
        $existing = News::where(['title' => $request->title, 'is_delete' => '0'])->first();
        if ($existing) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }
}
