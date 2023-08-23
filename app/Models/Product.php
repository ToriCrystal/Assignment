<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    protected $primaryKey = 'id_sp';
    protected $fillable = ['id_sp', 'ten_sp', 'hinh', 'gia', 'gia_km', 'mota'];
    
    public $timestamps = false;

    
}
