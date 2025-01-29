<?php

namespace App\Http\Controllers\Api;

use App\Models\Admin\Qco;
use Illuminate\Http\Request;
use App\Models\Admin\QcoCategory;
use App\Http\Controllers\Controller;

class QcoCategoryController extends Controller
{

    public function getQcoCategory()
    {
        $categories = QcoCategory::select('id', 'name', 'slug', 'image', 'seo_title', 'seo_description')->where('is_active', '1')->where('is_delete', '0')->get();

        foreach ($categories as $category) {
            $category->image = asset('backend/admin/images/qco_management/categories/' . $category->image);
            $category->count = Qco::where('is_delete', '0')->whereJsonContains('category_ids', '' . $category->id)->count();
        }

        return response()->json(['categories' => $categories]);
    }

}
