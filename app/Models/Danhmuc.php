<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    protected $table = "loai";
    protected $primaryKey = "id_loai";
    protected $fillable = ['ten_loai', 'thutu', 'anhien'];

}
