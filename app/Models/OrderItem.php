<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'donhangchitiet';
    protected $primaryKey = 'id_ct';

    protected $fillable = ['id_ct', 'id_dh', 'id_sp', 'ten_sp', 'soluong', 'gia'];
    public $timestamps = false;
}
