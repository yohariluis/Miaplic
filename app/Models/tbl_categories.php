<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_categories extends Model
{
    use HasFactory;
    protected $table = 'tbl_categories';
    public function products(){
        return $this->hasMany('App\Models\tbl_products');
    }
}
