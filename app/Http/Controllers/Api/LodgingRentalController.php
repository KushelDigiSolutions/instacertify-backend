<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Aminities;
use App\Models\Admin\BuisnessOwners;
use App\Models\Admin\Features;
use App\Models\Admin\Page;
use App\Models\Admin\Lodging;
use App\Models\Admin\States;
use Illuminate\Http\Request;
use App\Models\Admin\LodgingCategory;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class LodgingRentalController extends Controller
{

    public function getLodgings()
    {
        $lodging = Lodging::where('is_delete', '0')->where('is_active', '1')->whereNot('bigcommerce_id', 'null')->orderBy('created_at', 'desc')->get();
		
        return response()->json($lodging);
    }
	
	public function getLodging(Request $request , $slug = null)
    {
		$limit = !empty($request->input('limit'))?$request->input('limit'): 10;
		$offset = !empty($request->input('offset'))?$request->input('offset'): 0;
		$filter = !empty($request->input('filter'))?$request->input('filter'): 'desc';
		$cat = !empty($request->input('cat'))?$request->input('cat'): '';
		
		$categories = LodgingCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->get();
		
		if(!empty($slug)){
			$catid = LodgingCategory::select('id')->where('slug',$slug)->first();
			if(!empty($catid->id)){
				$cat = $catid->id;
			}
		}
		
		if(!empty($cat)){
            $events = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', $filter)->offset($offset)->whereJsonContains('category_ids', '' . $cat)->limit($limit)->get();
            $eventscount = Lodging::where('is_delete', '0')->whereJsonContains('category_ids', '' . $cat)->count();
        }else{
            $events = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', $filter)->offset($offset)->limit($limit)->get();
            $eventscount = Lodging::where('is_delete', '0')->count();
        }
                
	
        return response()->json(['lodging' => $events,'count'=>$eventscount,'categories'=>$categories,'media_url'=>asset('backend/admin/images/lodging_rental/vclasss/')]);
    }
	
	public function getLodgingCategory(){
		$categories = LodgingCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->get(); 
        return response()->json($categories);
	}
	
	public function searchLodgingDestination(){
		$states = States::where('is_delete', '0')->get(); 
        return response()->json($states);
	}
	
	 public function getLodgingHome()
    {
        $data["categories"] = LodgingCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->get(); 
        $data["top_banner"]["title"] = "Discover the world of Cabins & Aampsites";
        $data["top_banner"]["sub_title"] = "Cabin rentals around the world: From winter to exotic cabins, find your perfect match below!";
        $data["top_banner"]["banner"] = "https://s3-alpha-sig.figma.com/img/d0fb/f182/91b15cea105c1ccf42b3d7dcab1eca23?Expires=1709510400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=XUXU8tImGsUkWHbymbXWnHdiSOscUYwwvAhzMU41UzPz6eBy32mD0V5xl6gc15xYY06N5ce6k0qdsBH~anGrJ~3lWvKrt3uhI3etjOxEmJcq3ddQBtjlv2GJQx7~eHi3wCyJ62UhvbyeNDnAj350CJEz0eE5EtKIwdVBG~Y~teHx-T8cbZUjvFaI5-JiDBRsku1LLaHdswpII1YusHl6MrP6N0ZC21XIlHBBJT6n6d~YhLAo1Ga1q2yc9UUEtW~u1X0Afh2Fkg4pA0CIdhP7YFAxnaV1EBleIhypP4b3tHhhyK0ejarNL7~xcND8ijIgVVP7o-mlRrD4FZ873MeJiw__";
        $data["listing_first"]["name"] = "Camping";
        $data["listing_first"]["title"] = "";
        $data["listing_first"]["items"] = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(2)->get();
        $data["listing_first"]["link"] =  "cooking-classes";
        $data["listing_second"]["name"] = "Top-rated Camping rentals";
        $data["listing_second"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_second"]["items"] = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(8)->get();
        $data["listing_second"]["link"] =  "cooking-classes";
        $data["listing_third"]["name"] = "Discover your Perfect Cabin";
        $data["listing_third"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_third"]["items"] = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(8)->get();
        $data["listing_third"]["link"] =  "cooking-classes";
        $data["listing_fourth"]["name"] = "Explore Camping rentals around the world";
        $data["listing_fourth"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_fourth"]["items"] = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(8)->get();
        $data["listing_fourth"]["link"] =  "cooking-classes";
        $data["image_path"] = url("backend/admin/images/lodging_rental/vclasss/"); 
        return response()->json($data);
    }

    public function searchLodgingHome(Request $request,$slug = null){
       
        
        $limit = !empty($request->input('limit'))?$request->input('limit'): 10;
		$offset = !empty($request->input('offset'))?$request->input('offset'): 0;
		$filter = !empty($request->input('filter'))?$request->input('filter'): 'desc';
        $state_id = !empty($request->input('query'))?$request->input('query'): 1;
        $checkin = !empty($request->input('checkin'))?$request->input('checkin'): '';
        $checkout = !empty($request->input('checkout'))?$request->input('checkout'): '';
        $guest = !empty($request->input('guest'))?$request->input('guest'): '';
        $guest = explode(",",$guest);
        $checkIndate = Carbon::createFromTimestamp($checkin)->toDateString();
        $checkOutdate = Carbon::createFromTimestamp($checkout)->toDateString();
        
        $adult = str_replace("a","",$guest[0]);

        $data["items"] = Lodging::where('state_id',$state_id)->where('check_in','<=',$checkIndate)->where('room_capacity','>=',$adult)->where('check_out','>=',$checkOutdate)->where('is_delete', '0')->orderBy('created_at', $filter)->offset($offset)->limit($limit)->get();
        $data["total_count"] = Lodging::where('is_delete', '0')->orderBy('created_at', $filter)->offset($offset)->limit($limit)->count();
        $data["image_path"] = url("backend/admin/images/lodging_rental/vclasss/"); 
        return response()->json($data);
    }

	public function getLodgingSearch()
    {
        $data["listing_first"]["name"] = "Camping";
        $data["listing_first"]["title"] = "";
        $data["listing_first"]["items"] = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(2)->get();
        $data["listing_second"]["name"] = "Top-rated Camping rentals";
        $data["listing_second"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_second"]["items"] = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(10)->get();
        $data["listing_third"]["name"] = "Discover your Perfect Cabin";
        $data["listing_third"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_third"]["items"] = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(10)->get();
        $data["listing_fourth"]["name"] = "Explore Camping rentals around the world";
        $data["listing_fourth"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_fourth"]["items"] = Lodging::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(10)->get();

        return response()->json($data);
    }
	
    public function getLodgingApp()
    {
        $events = Lodging::where('is_delete', '0')->where('is_active', '1')->where('date', '>', date('Y-m-d H:i:s'))->orderBy('date', 'desc')->get();
	
        $dataArray['event'] = [];

        foreach ($events as $key => $event) {
            $dataArray['event'][$key]['id'] = $event->id;
            $dataArray['event'][$key]['title'] = $event->title;
            $dataArray['event'][$key]['short_description'] = $event->short_description;
            $dataArray['event'][$key]['description'] = $event->description;
            $dataArray['event'][$key]['number_of_tickets'] = $event->number_of_tickets;
            $dataArray['event'][$key]['ticket_price'] = $event->ticket_price;
            $dataArray['event'][$key]['location'] = $event->location;
            $dataArray['event'][$key]['date'] = $event->date;
            $dataArray['event'][$key]['start_date'] = $event->start_date;
            $dataArray['event'][$key]['end_date'] = $event->end_date;
            $dataArray['event'][$key]['start_time'] = $event->start_time;
            $dataArray['event'][$key]['end_time'] = $event->end_time;
            $dataArray['event'][$key]['single_day'] = $event->single_day;
            $dataArray['event'][$key]['all_day'] = $event->all_day;
            $dataArray['event'][$key]['is_active'] = $event->is_active;
            $dataArray['event'][$key]['created_at'] = $event->created_at;
            $dataArray['event'][$key]['type'] = $event->eventType;
            $images = json_encode($event->images);
            foreach (json_decode($images) as $yy => $image) {
                $dataArray['event'][$key]['image'][$yy] = asset('backend/admin/images/lodging_rental/vclasss/' . $image);
            }
        }

        return $this->successResponse($dataArray, "Lodging List.");

    }

    public function getLodgingBySlug($slug)
    {
        $lodging = Lodging::where('slug', $slug) ->join('buisness_owners','lodgings.buisness_owner_id', '=', 'buisness_owners.id' )->first();
        $dataArray['lodging'] = [];
        if ($lodging) {
            $dataArray['lodging']['id'] = $lodging->id;
            $dataArray['lodging']['bigcommerce_id'] = $lodging->bigcommerce_id;
            $dataArray['lodging']['title'] = $lodging->title;
            $dataArray['lodging']['short_description'] = $lodging->short_description;
            $dataArray['lodging']['description'] = $lodging->description;
            $dataArray['lodging']['number_of_tickets'] = $lodging->number_of_tickets;
            $dataArray['lodging']['price'] = $lodging->price;
            $dataArray['lodging']['location'] = $lodging->location;
            $dataArray['lodging']['location_iframe'] = $lodging->location_iframe;
            $dataArray['lodging']['date'] = $lodging->date;
            $dataArray['lodging']['start_date'] = $lodging->check_in;
            $dataArray['lodging']['end_date'] = $lodging->check_out;
            $dataArray['lodging']['start_time'] = $lodging->start_time;
            $dataArray['lodging']['end_time'] = $lodging->end_time;
            $dataArray['lodging']['seo_title'] = $lodging->seo_title;
            $dataArray['lodging']['seo_description'] = $lodging->seo_description;
            $dataArray['lodging']['single_day'] = $lodging->single_day;
            $dataArray['lodging']['all_day'] = $lodging->all_day;
            $dataArray['lodging']['is_active'] = $lodging->is_active;
            $dataArray['lodging']['created_at'] = $lodging->created_at;
            $dataArray['lodging']['slug'] = $lodging->slug;
            $dataArray['lodging']['type'] = $lodging->eventType;
            $dataArray['lodging']['aminities'] = Aminities::where('is_delete', 0)->whereIn('id',$lodging->aminities_ids)->get();
            $dataArray['lodging']['features'] = Features::where('is_delete', 0)->whereIn('id',$lodging->feature_ids)->get();
            $dataArray['lodging']['guest_allowed']['adult'] = 9;
            $dataArray['lodging']['guest_allowed']['child'] = 9;
            $dataArray['lodging']['guest_allowed']['infant'] = 9;
            $dataArray['lodging']['guest_allowed']['cabin'] = 9;
            $dataArray['lodging']['owner']['name'] = $lodging->name;
            $dataArray['lodging']['owner']['respon_time'] = $lodging->respon_time;
            $dataArray['lodging']['owner']['phone'] = $lodging->phone;
            $dataArray['lodging']['owner']['email'] = $lodging->email;
            $dataArray['lodging']['aminities_url'] = asset('backend/admin/images/lodging_rental/amenities/');
            $dataArray['lodging']['features_url'] = asset('backend/admin/images/lodging_rental/feature/');
            $images = json_encode($lodging->images);

            foreach (json_decode($images) as $yy => $image) {

                $dataArray['lodging']['image'][$yy] = asset('backend/admin/images/lodging_rental/vclasss/' . $image);
            }

        }


        return $dataArray;
    }

    public function getLodgingByCategory(Request $request, $slug)
    {
        $categories = LodgingCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->get();

        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/lodging_rental/categories/' . $category->image);
            $category->count = Lodging::where('is_delete', '0')->whereJsonContains('category_ids', '' . $category->id)->orderByDesc('date')->count();
        }
        $dataArray['category_all'] = $categories;

        $id = LodgingCategory::where('slug', $slug)->first();
        $dataArray['lodging'] = [];

        if ($id) {
            $dataArray['category']['id'] = $id->id;
            $dataArray['category']['name'] = $id->name;
            $dataArray['category']['image'] = asset('backend/admin/images/lodging_rental/categories/' . $id->image);
            $dataArray['category']['seo_title'] = $id->seo_title;
            $dataArray['category']['seo_description'] = $id->seo_description;
            $dataArray['category']['is_active'] = $id->is_active;
            $dataArray['category']['created_at'] = $id->created_at;
            $dataArray['category']['slug'] = $id->slug;
            if ($request->filter) {
    if($request->limit){
        $events = Lodging::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $id->id)->orderBy('created_at', $request->filter)->limit($request->limit)->get();
    }else{
        $events = Lodging::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $id->id)->orderBy('created_at', $request->filter)->get();
    }
} else {
    $events = Lodging::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $id->id)->orderBy('created_at', 'desc')->get();
}

            if ($events) {
                foreach ($events as $key => $event) {

                    $dataArray['lodging'][$key]['id'] = $event->id;
                    $dataArray['lodging'][$key]['bigcommerce_id'] = $event->bigcommerce_id;
                    $dataArray['lodging'][$key]['title'] = $event->title;
                    $dataArray['lodging'][$key]['short_description'] = $event->short_description;
                    $dataArray['lodging'][$key]['description'] = $event->description;
                    $dataArray['lodging'][$key]['number_of_tickets'] = $event->number_of_tickets;
                    $dataArray['lodging'][$key]['ticket_price'] = $event->ticket_price;
                    $dataArray['lodging'][$key]['location'] = $event->location;
                    $dataArray['lodging'][$key]['date'] = $event->date;
                    $dataArray['lodging'][$key]['start_date'] = $event->start_date;
                    $dataArray['lodging'][$key]['end_date'] = $event->end_date;
                    $dataArray['lodging'][$key]['start_time'] = $event->start_time;
                    $dataArray['lodging'][$key]['end_time'] = $event->end_time;
                    $dataArray['lodging'][$key]['seo_title'] = $event->seo_title;
                    $dataArray['lodging'][$key]['seo_description'] = $event->seo_description;
                    $dataArray['lodging'][$key]['single_day'] = $event->single_day;
                    $dataArray['lodging'][$key]['all_day'] = $event->all_day;
                    $dataArray['lodging'][$key]['is_active'] = $event->is_active;
                    $dataArray['lodging'][$key]['created_at'] = $event->created_at;
                    $dataArray['lodging'][$key]['slug'] = $event->slug;
                    $images = json_encode($event->images);

                    foreach (json_decode($images) as $yy => $image) {

                        $dataArray['lodging'][$key]['image'][$yy] = asset('backend/admin/images/lodging_rental/vclasss/' . $image);
                    }

                    // $event->image = asset('backend/admin/images/event_management/events'.$event->image);

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


    public function calculateLodging(Request $request){
        $data = $request->all();
        $datediff = $data["checked_out"] - $data["checked_in"];

        $days = round($datediff / (60 * 60 * 24));
        $lodging = Lodging::where('is_delete', '0')->where('is_active', '1')->where('id', '' . $data["lodging_id"])->select('price')->first();

        $price =  $days * $lodging->price;
       
        $resp['status'] = true;
        $resp['msg'] = "booking available";
        $resp['pricing']['price'] = $price;
        $resp['pricing']['tax'] = 10;
        $resp['pricing']['total'] = $price+ $resp['pricing']['tax'];
        
        return response()->json($resp);
    }

    public function createLodgingBooking(Request $request){
        $data = $request->all();
       
        $resp['status'] = true;
        $resp['msg'] = "booking saved";
        
        return response()->json($resp);
    }
}
