<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Event;
use Illuminate\Http\Request;
use App\Models\Admin\EventCategory;
use App\Http\Controllers\Controller;

class EventCategoryController extends Controller
{

    public function getEventCategory()
    {
        $categories = EventCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_active', '1')->where('is_delete', '0')->get();

        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/event_management/categories/' . $category->image);
            $category->count = Event::where('is_delete', '0')->whereJsonContains('category_ids', '' . $category->id)->count();
        }

        return response()->json(['categories' => $categories]);
    }

}
