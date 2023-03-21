<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notes extends Model
{
    protected $table='notes';
    use HasFactory;
    protected $fillable=[
        'notes'
    ];

}
