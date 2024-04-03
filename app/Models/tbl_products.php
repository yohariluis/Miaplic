<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_products extends Model
{
    use HasFactory;
    protected $table = 'tbl_products';
    public function productssales(){
        return $this->hasMany('App\Models\tbl_productssales');
    }
    public function productsreception(){
        return $this->hasMany('App\Models\tbl_reception');
    }
    public function productsticket(){
        return $this->hasMany('App\Models\tbl_ticket');
    }
}
