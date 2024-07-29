<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Page;
use App\Models\Admin\Equipment;
use Illuminate\Http\Request;
use App\Models\Admin\EquipmentCategory;
use App\Http\Controllers\Controller;

class EquipmentRentalController extends Controller
{

    public function getEquipments()
    {
        $equipment = Equipment::where('is_delete', '0')->where('is_active', '1')->whereNot('bigcommerce_id', 'null')->orderBy('created_at', 'desc')->get();
        
        return response()->json($equipment);
    }
    
    public function getEquipment(Request $request , $slug = null)
    {
        $limit = !empty($request->input('limit'))?$request->input('limit'): 10;
        $offset = !empty($request->input('offset'))?$request->input('offset'): 0;
        $filter = !empty($request->input('filter'))?$request->input('filter'): 'desc';
        $cat = !empty($request->input('cat'))?$request->input('cat'): '';
        
        $categories = EquipmentCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->where('is_active', '1')->get();
        
        if(!empty($slug)){
            $catid = EquipmentCategory::select('id')->where('slug',$slug)->first();
            if(!empty($catid->id)){
                $cat = $catid->id;
            }
        }
        
        if(!empty($cat)){
        $events = Equipment::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', $filter)->offset($offset)->whereJsonContains('category_ids', '' . $cat)->limit($limit)->get();
 $eventscount = Equipment::where('is_delete', '0')->whereJsonContains('category_ids', '' . $cat)->count();
    }else{
        $events = Equipment::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', $filter)->offset($offset)->limit($limit)->get();
             $eventscount = Equipment::where('is_delete', '0')->count();
    }
        
    
        return response()->json(['equipment' => $events,'count'=>$eventscount,'categories'=>$categories,'media_url'=>asset('backend/admin/images/equipment_management/equipments/'),'cat_url'=>asset('backend/admin/images/equipment_management/categories/')]);
    }


    public function searchEquipment(Request $request,$slug = null){
       
        $limit = !empty($request->input('limit'))?$request->input('limit'): 10;
		$offset = !empty($request->input('offset'))?$request->input('offset'): 0;
		$filter = !empty($request->input('filter'))?$request->input('filter'): 'desc';
        $query = !empty($request->input('query'))?$request->input('query'): '';
        $checkin = !empty($request->input('checkin'))?$request->input('checkin'): '';
        $checkout = !empty($request->input('checkout'))?$request->input('checkout'): '';
        $guest = !empty($request->input('guest'))?$request->input('guest'): '';
        $data["items"] = Equipment::where('title', 'like', "%$query%")->orWhere('description', 'like', "%$query%")->where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', $filter)->offset($offset)->limit($limit)->get();
        $data["total_count"] = Equipment::where('title', 'like', "%$query%")->orWhere('description', 'like', "%$query%")->where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', $filter)->offset($offset)->limit($limit)->count();
        $data["image_path"] = url("backend/admin/images/equipment_management/equipments/"); 
		$data["image_cat"] = url("backend/admin/images/equipment_management/categories/"); 
        return response()->json($data);
    }

    
    public function getEquipmentCategory(){
        $categories = EquipmentCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->where('is_active', '1')->get(); 
        return response()->json($categories);
    }
    
     public function getEquipmentHome(Request $request , $slug = null)
    {
        $limit = !empty($request->input('limit'))?$request->input('limit'): 10;
        $offset = !empty($request->input('offset'))?$request->input('offset'): 0;
        $filter = !empty($request->input('filter'))?$request->input('filter'): 'desc';

        $categories = EquipmentCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->where('is_active', '1')->get();

        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/equipment_management/categories/' . $category->image);
            $category->count = Equipment::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $category->id)->orderByDesc('date')->count();
        }
        $data['category_all'] = $categories;
        $data['items'] = Equipment::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $categories[0]->id)->offset($offset)->orderBy('created_at', $filter)->limit($limit)->get();
        $data["banner"][0]["title"] = "Rent Outdoor Gear Tents On Rent - Adventure Outdoor Rentals";
        $data["banner"][0]["subtitle"] = "";
        $data["banner"][0]["image_path"] = url("/backend/admin/images/equipment/banner.jpeg"); 
        $data["image_path"] =  asset('backend/admin/images/equipment_management/equipments/');
		$data["image_cat"] = url("backend/admin/images/equipment_management/categories/"); 
		 
        return response()->json($data);
    }

    public function getEquipmentSearch()
    {
         $data["listing_first"]["name"] = "Camping";
             $data["listing_first"]["title"] = "";
        $data["listing_first"]["items"] = Equipment::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(2)->get();
         $data["listing_second"]["name"] = "Top-rated Camping rentals";
         $data["listing_second"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_second"]["items"] = Equipment::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(10)->get();
         $data["listing_third"]["name"] = "Discover your Perfect Cabin";
    $data["listing_third"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_third"]["items"] = Equipment::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(10)->get();
         $data["listing_fourth"]["name"] = "Explore Camping rentals around the world";
              $data["listing_fourth"]["title"] = "We list the most popular unique rental camping around the world!";
        $data["listing_fourth"]["items"] = Equipment::where('is_delete', '0')->where('is_active', '1')->orderBy('created_at', 'desc')->limit(10)->get();
        
        return response()->json($data);
    }
    
    public function getEquipmentApp()
    {
        $events = Equipment::where('is_delete', '0')->where('is_active', '1')->where('date', '>', date('Y-m-d H:i:s'))->orderBy('date', 'desc')->get();
    
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
                $dataArray['event'][$key]['image'][$yy] = asset('backend/admin/images/equipment_management/equipments/' . $image);
            }
        }

        return $this->successResponse($dataArray, "Equipment List.");

    }

    public function getEquipmentBySlug($slug)
    {
        $event = Equipment::where('slug', $slug)->first();
        
        $dataArray['equipment'] = [];
        if ($event) {
            $dataArray['equipment']['id'] = $event->id;
            $dataArray['equipment']['bigcommerce_id'] = $event->bigcommerce_id;
            $dataArray['equipment']['title'] = $event->title;
            $dataArray['equipment']['short_description'] = $event->short_description;
            $dataArray['equipment']['description'] = $event->description;
            $dataArray['equipment']['details'] = $event->details;
            $dataArray['equipment']['terms'] = $event->terms;
            $dataArray['equipment']['price'] = $event->price;
            $dataArray['equipment']['security_price'] = $event->security_price;
            $dataArray['equipment']['delivery_price'] = $event->delivery_price;
            $dataArray['equipment']['store_address'] = $event->store_address;
            $dataArray['equipment']['location_frame'] = $event->location_frame;
            $dataArray['equipment']['start_date'] = $event->start_date;
            $dataArray['equipment']['end_date'] = $event->end_date;
            $dataArray['equipment']['stock'] = $event->stock;
            $dataArray['equipment']['seo_title'] = $event->seo_title;
            $dataArray['equipment']['seo_description'] = $event->seo_description;
            $dataArray['equipment']['created_at'] = $event->created_at;
            $dataArray['equipment']['slug'] = $event->slug;
            $dataArray['equipment']['type'] = $event->eventType;
            $images = json_encode($event->images);

            foreach (json_decode($images) as $yy => $image) {

                $dataArray['equipment']['image'][$yy] = asset('backend/admin/images/equipment_management/equipments/' . $image);
            }

        }

        $dataArray['similar'] =  Equipment::where('title', 'like', "%$event->tags%")->orWhere('description', 'like', "%$$event->tags%")->where('is_delete', '0')->limit(10)->select('id','slug','title','images','price')->get();

        $dataArray["image_path"] =  asset('backend/admin/images/equipment_management/equipments/');
		$dataArray["image_cat"] = url("backend/admin/images/equipment_management/categories/"); 
        return $dataArray;
    }

    public function getEquipmentByCategory(Request $request, $slug)
    {
        $limit = !empty($request->input('limit'))?$request->input('limit'): 10;
        $offset = !empty($request->input('offset'))?$request->input('offset'): 0;
        $filter = !empty($request->input('filter'))?$request->input('filter'): 'desc';

        $categories = EquipmentCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_delete', '0')->where('is_active', '1')->get();

        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/equipment_management/categories/' . $category->image);
            $category->count = Equipment::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $category->id)->orderByDesc('date')->count();
        }
        $dataArray['category_all'] = $categories;

        $id = EquipmentCategory::where('slug', $slug)->first();
        $dataArray['equipment'] = [];

        if ($id) {
            $dataArray['category']['id'] = $id->id;
            $dataArray['category']['name'] = $id->name;
            $dataArray['category']['image'] = asset('backend/admin/images/equipment_management/categories/' . $id->image);
            $dataArray['category']['seo_title'] = $id->seo_title;
            $dataArray['category']['seo_description'] = $id->seo_description;
            $dataArray['category']['is_active'] = $id->is_active;
            $dataArray['category']['created_at'] = $id->created_at;
            $dataArray['category']['slug'] = $id->slug;
            if ($request->filter) {
    if($request->limit){
        $events = Equipment::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $id->id)->orderBy('created_at', $request->filter)->limit($request->limit)->get();
    }else{
        $events = Equipment::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $id->id)->orderBy('created_at', $request->filter)->get();
    }
} else {
    $events = Equipment::where('is_delete', '0')->where('is_active', '1')->whereJsonContains('category_ids', '' . $id->id)->orderBy('created_at', 'desc')->get();
}

            if ($events) {
                foreach ($events as $key => $event) {

                    $dataArray['equipment'][$key]['id'] = $event->id;
                    $dataArray['equipment'][$key]['bigcommerce_id'] = $event->bigcommerce_id;
                    $dataArray['equipment'][$key]['title'] = $event->title;
                    $dataArray['equipment'][$key]['short_description'] = $event->short_description;
                    $dataArray['equipment'][$key]['description'] = $event->description;
                    $dataArray['equipment'][$key]['number_of_tickets'] = $event->number_of_tickets;
                    $dataArray['equipment'][$key]['ticket_price'] = $event->ticket_price;
                    $dataArray['equipment'][$key]['location'] = $event->location;
                    $dataArray['equipment'][$key]['date'] = $event->date;
                    $dataArray['equipment'][$key]['start_date'] = $event->start_date;
                    $dataArray['equipment'][$key]['end_date'] = $event->end_date;
                    $dataArray['equipment'][$key]['start_time'] = $event->start_time;
                    $dataArray['equipment'][$key]['end_time'] = $event->end_time;
                    $dataArray['equipment'][$key]['seo_title'] = $event->seo_title;
                    $dataArray['equipment'][$key]['seo_description'] = $event->seo_description;
                    $dataArray['equipment'][$key]['single_day'] = $event->single_day;
                    $dataArray['equipment'][$key]['all_day'] = $event->all_day;
                    $dataArray['equipment'][$key]['is_active'] = $event->is_active;
                    $dataArray['equipment'][$key]['created_at'] = $event->created_at;
                    $dataArray['equipment'][$key]['slug'] = $event->slug;
                    $images = json_encode($event->images);

                    foreach (json_decode($images) as $yy => $image) {

                        $dataArray['equipment'][$key]['image'][$yy] = asset('backend/admin/images/equipment_management/equipments/' . $image);
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
    public function calculateEquipment(Request $request){
        $data = $request->all();
        $datediff = $data["checked_out"] - $data["checked_in"];

        $days = round($datediff / (60 * 60 * 24));
        $equipment = Equipment::where('is_delete', '0')->where('is_active', '1')->where('id', '' . $data["equipment_id"])->select('price')->first();

        $price =  $days * $equipment->price;
       
        $resp['status'] = true;
        $resp['msg'] = "booking available";
        $resp['pricing']['price'] = $price;
        $resp['pricing']['tax'] = 10;
        $resp['pricing']['total'] = $price+ $resp['pricing']['tax'];
        
        return response()->json($resp);
    }

    public function createEquipmentBooking(Request $request){
        $data = $request->all();
       
        $resp['status'] = true;
        $resp['msg'] = "booking saved";
        
        return response()->json($resp);
    }
}
