<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    public function getFooterLogoAttribute($value) {
        return $value ? asset('backend/admin/images/footer/' . $value) : null;
    }
}
