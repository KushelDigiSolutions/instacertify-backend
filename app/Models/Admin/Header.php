<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    public function getBackgroundImageAttribute($value) {
        return $value ? asset('backend/admin/images/header/' . $value) : null;
    }

    public function getDefaultLogoAttribute($value) {
        return $value ? asset('backend/admin/images/header/' . $value) : null;
    }
}
