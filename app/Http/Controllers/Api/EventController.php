<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Page;
use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Models\Admin\EventCategory;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function getEvent()
    {
        $currentDateTime = date('Y-m-d H:i:s');
		/* $events = Event::where(function($query) use ($currentDateTime) {
            $query->whereRaw("CONCAT(end_date, ' ', end_time) >= ?", [$currentDateTime])
                    ->orWhere(function($subQuery) use ($currentDateTime) {
                        $subQuery->where('single_day', '1')
                        ->whereRaw("CONCAT(date, ' ', end_time) >= ?", [$currentDateTime]);
                    });
            })->where('is_delete',"0")->where('is_active',"1")->orderBy('date', 'desc')->get(); */
            $events = Event::where('is_delete',"0")->where('is_active',"1")->orderBy('date', 'desc')->get();
        return response()->json(['events' => $events]);
    }

    public function getEventApp()
    {
        $currentDateTime = date('Y-m-d H:i:s');
		$events = Event::where(function($query) use ($currentDateTime) {
            $query->where('end_date', '>=', $currentDateTime)
                    ->orWhere(function($subQuery) use ($currentDateTime) {
                        $subQuery->where('single_day', '1')
                        ->whereRaw("CONCAT(date, ' ', end_time) > ?", [$currentDateTime]);
                    });
            })->orderBy('date', 'desc')->get();
        
        $dataArray['event'] = [];

        foreach ($events as $key => $event) {
            $dataArray['event'][$key]['id'] = $event->id;
            $dataArray['event'][$key]['title'] = $event->title;
            $dataArray['event'][$key]['short_description'] = $event->short_description;
            $dataArray['event'][$key]['description'] = $event->description;
            $dataArray['event'][$key]['number_of_tickets'] = $event->number_of_tickets;
            $dataArray['event'][$key]['ticket_price'] = $event->ticket_price;
            $dataArray['event'][$key]['location_iframe'] = $event->location_iframe;
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
                $dataArray['event'][$key]['image'][$yy] = asset('backend/admin/images/event_management/events/' . $image);
            }
        }

        return $this->successResponse($dataArray, "Event List.");

    }

    public function getEventBySlug($slug)
    {
        $event = Event::where('slug', $slug)->with(['eventType'])->first();
		
        $dataArray['event'] = [];
        if ($event) {
            $dataArray['event']['id'] = $event->id;
            $dataArray['event']['bigcommerce_id'] = $event->bigcommerce_id;
            $dataArray['event']['title'] = $event->title;
            $dataArray['event']['short_description'] = $event->short_description;
            $dataArray['event']['description'] = $event->description;
            $dataArray['event']['number_of_tickets'] = $event->number_of_tickets;
            $dataArray['event']['ticket_price'] = $event->ticket_price;
            $dataArray['event']['location_iframe'] = $event->location_iframe;
            $dataArray['event']['location'] = $event->location;
            $dataArray['event']['date'] = $event->date;
            $dataArray['event']['start_date'] = $event->start_date;
            $dataArray['event']['end_date'] = $event->end_date;
            $dataArray['event']['start_time'] = $event->start_time;
            $dataArray['event']['end_time'] = $event->end_time;
            $dataArray['event']['seo_title'] = $event->seo_title;
            $dataArray['event']['seo_description'] = $event->seo_description;
            $dataArray['event']['single_day'] = $event->single_day;
            $dataArray['event']['all_day'] = $event->all_day;
            $dataArray['event']['is_active'] = $event->is_active;
            $dataArray['event']['created_at'] = $event->created_at;
            $dataArray['event']['slug'] = $event->slug;
            $dataArray['event']['type'] = $event->eventType;
            $images = json_encode($event->images);

            foreach (json_decode($images) as $yy => $image) {

                $dataArray['event']['image'][$yy] = asset('backend/admin/images/event_management/events/' . $image);
            }

        }


        return $dataArray;
    }

    public function getEventByCategory(Request $request, $slug)
    {
        $categories = EventCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_active', '1')->where('is_delete', '0')->get();
        $currentDateTime = date('Y-m-d H:i:s');
       
        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/event_management/categories/' . $category->image);
           /*  $category->count = Event::where(function($query) use ($currentDateTime) {
                $query->whereRaw("CONCAT(end_date, ' ', end_time) >= ?", [$currentDateTime])
                        ->orWhere(function($subQuery) use ($currentDateTime) {
                            $subQuery->where('single_day', '1')
                            ->whereRaw("CONCAT(date, ' ', end_time) >= ?", [$currentDateTime]);
                        });
                })->whereJsonContains('category_ids', '' . $category->id)->where('is_delete',"0")->where('is_active',"1")->count(); */

                $category->count = Event::whereJsonContains('category_ids', '' . $category->id)->where('is_delete',"0")->where('is_active',"1")->count();
           
            
        }
        $dataArray['category_all'] = $categories;
       // dd($dataArray);
        $id = EventCategory::where('slug', $slug)->first();
        $dataArray['event'] = [];
        $currentDateTime = date('Y-m-d H:i:s');
        $categoryId = $id->id;
        if ($id) {
            $dataArray['category']['id'] = $id->id;
            $dataArray['category']['name'] = $id->name;
            $dataArray['category']['image'] = asset('backend/admin/images/event_management/categories/' . $id->image);
            $dataArray['category']['seo_title'] = $id->seo_title;
            $dataArray['category']['seo_description'] = $id->seo_description;
            $dataArray['category']['is_active'] = $id->is_active;
            $dataArray['category']['created_at'] = $id->created_at;
            $dataArray['category']['slug'] = $id->slug;
            if ($request->filter) {
                if($request->limit){
                    $events = Event::where(function($query) use ($currentDateTime) {
                        $query->whereRaw("CONCAT(end_date, ' ', end_time) >= ?", [$currentDateTime])
                                ->orWhere(function($subQuery) use ($currentDateTime) {
                                    $subQuery->where('single_day', '1')
                                    ->whereRaw("CONCAT(date, ' ', end_time) >= ?", [$currentDateTime]);
                                });
                        })->whereJsonContains('category_ids', '' . $categoryId)->where('is_delete',"0")->where('is_active',"1")->orderBy('date', $request->filter)->limit($request->limit)->get();
                    
                }else{
                    $events = Event::where(function($query) use ($currentDateTime) {
                        $query->whereRaw("CONCAT(end_date, ' ', end_time) >= ?", [$currentDateTime])
                                ->orWhere(function($subQuery) use ($currentDateTime) {
                                    $subQuery->where('single_day', '1')
                                    ->whereRaw("CONCAT(date, ' ', end_time) >= ?", [$currentDateTime]);
                                });
                        })->whereJsonContains('category_ids', '' . $categoryId)->where('is_delete',"0")->where('is_active',"1")->orderBy('date', $request->filter)->get();
                    
                }
        } else {
            $events = Event::where(function($query) use ($currentDateTime) {
                $query->whereRaw("CONCAT(end_date, ' ', end_time) >= ?", [$currentDateTime])
                        ->orWhere(function($subQuery) use ($currentDateTime) {
                            $subQuery->where('single_day', '1')
                            ->whereRaw("CONCAT(date, ' ', end_time) >= ?", [$currentDateTime]);
                        });
                })->whereJsonContains('category_ids', '' . $categoryId)->where('is_delete',"0")->where('is_active',"1")->orderBy('date', "desc")->get();
      
        }

            if ($events) {
                foreach ($events as $key => $event) {

                    $dataArray['event'][$key]['id'] = $event->id;
                    $dataArray['event'][$key]['bigcommerce_id'] = $event->bigcommerce_id;
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
                    $dataArray['event'][$key]['seo_title'] = $event->seo_title;
                    $dataArray['event'][$key]['seo_description'] = $event->seo_description;
                    $dataArray['event'][$key]['single_day'] = $event->single_day;
                    $dataArray['event'][$key]['all_day'] = $event->all_day;
                    $dataArray['event'][$key]['is_active'] = $event->is_active;
                    $dataArray['event'][$key]['created_at'] = $event->created_at;
                    $dataArray['event'][$key]['slug'] = $event->slug;
                    $images = json_encode($event->images);

                    foreach (json_decode($images) as $yy => $image) {

                        $dataArray['event'][$key]['image'][$yy] = asset('backend/admin/images/event_management/events/' . $image);
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
}
