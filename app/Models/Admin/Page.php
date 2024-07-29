<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public function header()
    {
        return $this->belongsTo(Header::class, 'header_id');
    }
    public function footer()
    {
        return $this->belongsTo(Footer::class, 'footer_id');
    }
    public function navigation()
    {
        return $this->belongsTo(Navigation::class, 'navigation_id');
    }
}
