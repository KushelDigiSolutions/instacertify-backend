<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\News;
use Illuminate\Http\Request;
use App\Models\Admin\NewsCategory;
use App\Http\Controllers\Controller;

class NewsCategoryController extends Controller
{

    public function getNewsCategory()
    {
        $categories = NewsCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_active', '1')->where('is_delete', '0')->get();

        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/news_management/categories/' . $category->image);
            $category->count = News::where('is_delete', '0')->whereJsonContains('category_ids', '' . $category->id)->count();
        }

        return response()->json(['categories' => $categories]);
    }

}
