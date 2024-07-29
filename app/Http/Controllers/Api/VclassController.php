<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Page;
use App\Models\Admin\Vclass;
use Illuminate\Http\Request;
use App\Models\Admin\VclassCategory;
use App\Models\Admin\BannerTemplate;
use App\Models\Admin\Banner;
use App\Http\Controllers\Controller;

class VclassController extends Controller
{

    public function getVclass(Request $request , $slug = null)
    {
		$limit = !empty($request->input('limit'))?$request->input('limit'): 10;
		$offset = !empty($request->input('offset'))?$request->input('offset'): 0;
		$filter = !empty($request->input('filter'))?$request->input('filter'): 'desc';
		$cat = !empty($request->input('cat'))?$request->input('cat'): '';
		
		$categories = VclassCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_active', '1')->where('is_delete', '0')->get();
		
		if(!empty($slug)){
			$catid = VclassCategory::select('id')->where('slug',$slug)->first();
			if(!empty($catid->id)){
				$cat = $catid->id;
			}
		}
		
		if(!empty($cat)){
          
        $events = Vclass::where('is_delete', '0')->where('is_active', '1')->where('end_date', '>=', date('Y-m-d H:i:s'))->orderBy('start_date', $filter)->offset($offset)->whereJsonContains('category_ids', '' . $cat)->limit($limit)->get();
        //dd($events);
       $eventscount = Vclass::where('is_delete', '0')->where('is_active', '1')->where('end_date', '>=', date('Y-m-d H:i:s'))->whereJsonContains('category_ids', '' . $cat)->count();
	}else{
        $events = Vclass::where('is_delete', '0')->where('is_active', '1')->where('end_date', '>=', date('Y-m-d H:i:s'))->orderBy('start_date', $filter)->offset($offset)->limit($limit)->get();
			 $eventscount = Vclass::where('is_delete', '0')->where('is_active', '1')->where('end_date', '>=', date('Y-m-d H:i:s'))->count();
	}
		
	
        return response()->json(['vclasses' => $events,'count'=>$eventscount,'categories'=>$categories,'media_url'=>asset('backend/admin/images/vclass_management/vclass/'),'cat_url'=>asset('backend/admin/images/vclass_management/vclass_management/categories/')]);
    }
	
	public function getBanners(Request $request, $slug){
		$banners = BannerTemplate::join('banners', 'banner_templates.id', '=', 'banners.banner_template_id')->where('name',$slug)->get();
		if(empty($banners)){
			$banners = "";
		}
		//dd($banners);
	 return response()->json(['banners' => $banners,'media_url'=>asset('backend/admin/media/'),'cat_url'=>asset('backend/admin/images/vclass_management/vclass_management/categories/')]);
	}

    public function getVclassApp()
    {
        $events = Vclass::where('is_delete', '0')->where('end_date', '>', date('Y-m-d H:i:s'))->orderBy('start_date', 'desc')->get();
	
        $dataArray['classes'] = [];

        foreach ($events as $key => $event) {
            $dataArray['classes'][$key]['id'] = $event->id;
            $dataArray['classes'][$key]['title'] = $event->title;
            $dataArray['classes'][$key]['short_description'] = $event->short_description;
            $dataArray['classes'][$key]['description'] = $event->description;
            $dataArray['classes'][$key]['number_of_tickets'] = $event->number_of_tickets;
            $dataArray['classes'][$key]['ticket_price'] = $event->ticket_price;
            $dataArray['classes'][$key]['location'] = $event->location;
            $dataArray['classes'][$key]['date'] = $event->date;
            $dataArray['classes'][$key]['start_date'] = $event->start_date;
            $dataArray['classes'][$key]['end_date'] = $event->end_date;
            $dataArray['classes'][$key]['start_time'] = $event->start_time;
            $dataArray['classes'][$key]['end_time'] = $event->end_time;
            $dataArray['classes'][$key]['single_day'] = $event->single_day;
            $dataArray['classes'][$key]['all_day'] = $event->all_day;
            $dataArray['classes'][$key]['is_active'] = $event->is_active;
            $dataArray['classes'][$key]['created_at'] = $event->created_at;
            $dataArray['classes'][$key]['type'] = $event->eventType;
            $images = json_encode($event->images);
            foreach (json_decode($images) as $yy => $image) {
                $dataArray['classes'][$key]['image'][] = asset('backend/admin/images/vclass_management/vclass/' . $image);
            }
        }

        return $this->successResponse($dataArray, "Class List.");

    }

    public function getVclassBySlug($slug)
    {
        $event = Vclass::where('slug', $slug)->first();
		
        $dataArray['classes'] = [];
        if ($event) {
			 $banner = [];
			$instruct_pic = [];
			if(!empty($event->banner)){
				foreach($event->banner as $baner){
					$banner[] = asset('backend/admin/images/vclass_management/vclass/' .$baner);
				}
			}
			if(!empty($event->instruct_pic)){
				foreach($event->instruct_pic as $inst){
				$instruct_pic[] = asset('backend/admin/images/vclass_management/instructors/' . $inst);
				}
			}
			
			$categories = VclassCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->whereIn('id', $event->category_ids)->where('is_active', '1')->where('is_delete', '0')->get();
            $dataArray['classes']['id'] = $event->id;
			$dataArray['classes']['bigcommerce_id'] = $event->bigcommerce_id;
			$dataArray['classes']['title'] = $event->title;
			$dataArray['classes']['slug'] = $event->slug;
			$dataArray['classes']['prerequisites'] = $event->prerequisites;
			$dataArray['classes']['description'] = $event->description;
			$dataArray['classes']['banner'] = $banner;
			$dataArray['classes']['video'] = $event->video;
			$dataArray['classes']['location'] = $event->location;
			$dataArray['classes']['iframe'] = $event->iframe;
			$dataArray['classes']['total_student'] = $event->total_student;
			$dataArray['classes']['category_ids'] = $event->category_ids;
			$dataArray['classes']['class_length'] = $event->class_length;
			$dataArray['classes']['price'] = $event->price;
			$dataArray['classes']['start_date'] = $event->start_date;
			$dataArray['classes']['end_date'] = $event->end_date;
			$dataArray['classes']['instruct_name'] = $event->instruct_name;
			$dataArray['classes']['instruct_bio'] = $event->instruct_bio;
			$dataArray['classes']['instruct_pic'] = $instruct_pic;
			$dataArray['classes']['seo_title'] = $event->seo_title;
			$dataArray['classes']['seo_description'] = $event->seo_description;
			$dataArray['classes']['single_day'] = $event->single_day;
			$dataArray['classes']['all_day'] = $event->all_day;
			$dataArray['classes']['is_active'] = $event->is_active;
			$dataArray['classes']['created_at'] = $event->created_at;
			$dataArray['classes']['categories'] =$categories;
			$images = json_encode($event->images);
			if(!empty($images)){
			foreach (json_decode($images) as $yy => $image) {

				$dataArray['classes']['image'][$yy] = asset('backend/admin/images/vclass_management/vclass/' . $image);
			}}else{
				$images = array();
			}

        }


        return $dataArray;
    }

    public function getVclassByCategory(Request $request, $slug)
    {
        $categories = VclassCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->where('is_active', '1')->get();
		
        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/vclasses_management/categories/' . $category->image);
            $category->count = Vclass::where('is_delete', '0')->where('is_active', '1')->where('end_date', '>', date('Y-m-d H:i:s'))->whereJsonContains('category_ids', '' . $category->id)->orderByDesc('start_date')->count();
        }
        $dataArray['category_all'] = $categories;
		
        $id = VclassCategory::where('slug', $slug)->first();
        $dataArray['classes'] = [];

        if ($id) {
            $dataArray['category']['id'] = $id->id;
            $dataArray['category']['name'] = $id->name;
            $dataArray['category']['image'] = asset('backend/admin/images/vclass_management/categories/' . $id->image);
            $dataArray['category']['seo_title'] = $id->seo_title;
            $dataArray['category']['seo_description'] = $id->seo_description;
            $dataArray['category']['is_active'] = $id->is_active;
            $dataArray['category']['created_at'] = $id->created_at;
            $dataArray['category']['slug'] = $id->slug;
			
            if ($request->filter) {
    if($request->limit){
        $events = Vclass::where('is_delete', '0')->where('is_active', '1')->where('end_date', '>', date('Y-m-d H:i:s'))->whereJsonContains('category_ids', '' . $id->id)->orderBy('start_date', $request->filter)->limit($request->limit)->get();
    }else{
        $events = Vclass::where('is_delete', '0')->where('is_active', '1')->where('end_date', '>', date('Y-m-d H:i:s'))->whereJsonContains('category_ids', '' . $id->id)->orderBy('start_date', $request->filter)->get();
    }
} else {
    $events = Vclass::where('is_delete', '0')->where('is_active', '1')->where('end_date', '>', date('Y-m-d H:i:s'))->whereJsonContains('category_ids', '' . $id->id)->orderBy('start_date', 'desc')->get();
}

            if ($events) {
                foreach ($events as $key => $event) {

                    $dataArray['classes'][$key]['id'] = $event->id;
                    $dataArray['classes'][$key]['bigcommerce_id'] = $event->bigcommerce_id;
                    $dataArray['classes'][$key]['title'] = $event->title;
                    $dataArray['classes'][$key]['slug'] = $event->slug;
                    $dataArray['classes'][$key]['prerequisites'] = $event->prerequisites;
                    $dataArray['classes'][$key]['description'] = $event->description;
					if(!empty($event->banner)){
						foreach($event->banner as $banner){
                    		$dataArray['classes'][$key]['banner'][] = asset('backend/admin/images/vclass_management/vclass/' . $banner);}
					}
                    $dataArray['classes'][$key]['video'] = $event->video;
					$dataArray['classes'][$key]['iframe'] = $event->iframe;
					$dataArray['classes'][$key]['total_student'] = $event->total_student;
                    $dataArray['classes'][$key]['location'] = $event->location;
                    $dataArray['classes'][$key]['category_ids'] = $event->category_ids;
                    $dataArray['classes'][$key]['class_length'] = $event->class_length;
                    $dataArray['classes'][$key]['price'] = $event->price;
                    $dataArray['classes'][$key]['start_date'] = $event->start_date;
                    $dataArray['classes'][$key]['end_date'] = $event->end_date;
                    $dataArray['classes'][$key]['instruct_name'] = $event->instruct_name;
                    $dataArray['classes'][$key]['instruct_bio'] = $event->instruct_bio;
					
					if(!empty($event->instruct_pic)){
						foreach($event->instruct_pic as $instruct_pic){
                    		$dataArray['classes'][$key]['instruct_pic'][] = asset('backend/admin/images/vclass_management/instructors/' . $instruct_pic);}
					}
                    $dataArray['classes'][$key]['seo_title'] = $event->seo_title;
                    $dataArray['classes'][$key]['seo_description'] = $event->seo_description;
                    $dataArray['classes'][$key]['single_day'] = $event->single_day;
                    $dataArray['classes'][$key]['all_day'] = $event->all_day;
                    $dataArray['classes'][$key]['is_active'] = $event->is_active;
                    $dataArray['classes'][$key]['created_at'] = $event->created_at;
                    $images = json_encode($event->images);

                    foreach (json_decode($images) as $yy => $image) {

                        $dataArray['classes'][$key]['image'][] = asset('backend/admin/images/vclass_management/vclass/' . $image);
                    }

                }
            }
        }
        return $dataArray;
    }
    public function getVclassesBySlug(Request $request)
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

    public function getVclassHome()
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
	
	 public function getVclassCategory()
    {
        $categories = VclassCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->where('is_active', '1')->get();

        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/vclass_management/categories/' . $category->image);
            $category->count = Vclass::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $category->id)->count();
        }

        return response()->json(['categories' => $categories]);
    }
}
