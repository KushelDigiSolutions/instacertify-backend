<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Page;
use App\Models\Admin\News;
use Illuminate\Http\Request;
use App\Models\Admin\NewsCategory;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function getNews()
    {
        $currentDateTime = date('Y-m-d H:i:s');
	
            $news = News::where('is_delete',"0")->where('is_active',"1")->orderBy('date', 'desc')->get();
        return response()->json(['news' => $news]);
    }

    public function getNewsApp()
    {
        $currentDateTime = date('Y-m-d H:i:s');
		
        $news = News::where('is_delete',"0")->where('is_active',"1")->orderBy('date', 'desc')->get();
        
        $dataArray['news'] = [];

        foreach ($news as $key => $news) {
            $dataArray['news'][$key]['id'] = $news->id;
            $dataArray['news'][$key]['title'] = $news->title;
            $dataArray['news'][$key]['description'] = $news->description;
            $dataArray['news'][$key]['is_active'] = $news->is_active;
            $dataArray['news'][$key]['created_at'] = $news->created_at;
            $images = json_encode($news->images);
            foreach (json_decode($images) as $yy => $image) {
                $dataArray['news'][$key]['image'][$yy] = asset('backend/admin/images/news_management/news/' . $image);
            }
        }

        return $this->successResponse($dataArray, "News List.");

    }

    public function getNewsBySlug($slug)
    {
        $news = News::where('slug', $slug)->with(['NewsType'])->first();
		
        $dataArray['news'] = [];
        if ($news) {
            $dataArray['news']['id'] = $news->id;
            $dataArray['news']['bigcommerce_id'] = $news->bigcommerce_id;
            $dataArray['news']['title'] = $news->title;
            $dataArray['news']['description'] = $news->description;
            $dataArray['news']['seo_title'] = $news->seo_title;
            $dataArray['news']['seo_description'] = $news->seo_description;
            $dataArray['news']['is_active'] = $news->is_active;
            $dataArray['news']['created_at'] = $news->created_at;
            $dataArray['news']['slug'] = $news->slug;
            $dataArray['news']['type'] = $news->NewsType;
            $images = json_encode($news->images);

            foreach (json_decode($images) as $yy => $image) {

                $dataArray['news']['image'][$yy] = asset('backend/admin/images/news_management/news/' . $image);
            }

        }


        return $dataArray;
    }

    public function getNewsByCategory(Request $request, $slug)
    {
        $categories = NewsCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_active', '1')->where('is_delete', '0')->get();
        $currentDateTime = date('Y-m-d H:i:s');
       
        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/news_management/categories/' . $category->image);

                $category->count = News::whereJsonContains('category_ids', '' . $category->id)->where('is_delete',"0")->where('is_active',"1")->count();
           
            
        }
        $dataArray['category_all'] = $categories;
       // dd($dataArray);
        $id = NewsCategory::where('slug', $slug)->first();
        $dataArray['news'] = [];
        $currentDateTime = date('Y-m-d H:i:s');
        $categoryId = $id->id;
        if ($id) {
            $dataArray['category']['id'] = $id->id;
            $dataArray['category']['name'] = $id->name;
            $dataArray['category']['image'] = asset('backend/admin/images/news_management/categories/' . $id->image);
            $dataArray['category']['seo_title'] = $id->seo_title;
            $dataArray['category']['seo_description'] = $id->seo_description;
            $dataArray['category']['is_active'] = $id->is_active;
            $dataArray['category']['created_at'] = $id->created_at;
            $dataArray['category']['slug'] = $id->slug;
            if ($request->filter) {
                if($request->limit){
                   
                    $news = News::whereJsonContains('category_ids', '' . $categoryId)->where('is_delete',"0")->where('is_active',"1")->orderBy('date', $request->filter)->limit($request->limit)->get();
                }else{
                        $news = News::whereJsonContains('category_ids', '' . $categoryId)->where('is_delete',"0")->where('is_active',"1")->orderBy('date', $request->filter)->get();
                }
        } else {
                $news = News::whereJsonContains('category_ids', '' . $categoryId)->where('is_delete',"0")->where('is_active',"1")->orderBy('date', "desc")->get();
        }

            if ($news) {
                foreach ($news as $key => $news) {

                    $dataArray['news'][$key]['id'] = $news->id;
                    $dataArray['news'][$key]['title'] = $news->title;
                    $dataArray['news'][$key]['description'] = $news->description;
                    $dataArray['news'][$key]['seo_title'] = $news->seo_title;
                    $dataArray['news'][$key]['seo_description'] = $news->seo_description;
                    $dataArray['news'][$key]['is_active'] = $news->is_active;
                    $dataArray['news'][$key]['created_at'] = $news->created_at;
                    $dataArray['news'][$key]['slug'] = $news->slug;
                    $images = json_encode($news->images);

                    foreach (json_decode($images) as $yy => $image) {

                        $dataArray['news'][$key]['image'][$yy] = asset('backend/admin/images/news_management/news/' . $image);
                    }

                    // $news->image = asset('backend/admin/images/news_management/news'.$news->image);

                }
            }
        }
        return $dataArray;
        // return response()->json([$dataArray]);
    }
    public function getPageBySlug(Request $request)
    {
        if ($request->slug) {
            $pages = Page::where('is_published', '1')->orderBy('created_at', 'desc')->where('custom_url', $request->slug)->with(['header', 'footer', 'navigation'])->select('title', 'custom_url', 'seo_title', 'seo_description', 'seo_keywords', 'html', 'header_id', 'navigation_id', 'footer_id')->first();
            $pages->html = str_replace("<html>", "", $pages->html);
            $pages->html = str_replace("</html>", "", $pages->html);
            $pages->html = str_replace("<body>", "", $pages->html);
            $pages->html = str_replace("</body>", "", $pages->html);
            $pages->html = str_replace("<head>", "", $pages->html);
            $pages->html = str_replace("</head>", "", $pages->html);
            $pages->html = str_replace("<!DOCTYPE html>", "", $pages->html);
            $pages->html = str_replace("<html lang='en'>", "", $pages->html);


        }

        return response()->json(['page' => $pages, 'header' => isset($pages->header) ? $pages->header : null, 'navigation' => isset($pages->navigation) ? $pages->navigation : null, 'footer' => isset($pages->footer) ? $pages->footer : null]);
    }

    public function getPageHome()
    {
            $pages = Page::where('is_homepage', '1')->with(['header', 'footer', 'navigation'])->select('title', 'custom_url', 'seo_title', 'seo_description', 'seo_keywords', 'html', 'header_id', 'navigation_id', 'footer_id')->first();
            $pages->html = str_replace("<html>", "", $pages->html);
            $pages->html = str_replace("</html>", "", $pages->html);
            $pages->html = str_replace("<body>", "", $pages->html);
            $pages->html = str_replace("</body>", "", $pages->html);
            $pages->html = str_replace("<head>", "", $pages->html);
            $pages->html = str_replace("</head>", "", $pages->html);
            $pages->html = str_replace("<!DOCTYPE html>", "", $pages->html);
            $pages->html = str_replace("<html lang='en'>", "", $pages->html);


        return response()->json(['page' => $pages, 'header' => isset($pages->header) ? $pages->header : null, 'navigation' => isset($pages->navigation) ? $pages->navigation : null, 'footer' => isset($pages->footer) ? $pages->footer : null]);
    }
}
