<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compain extends Model
{
    protected $table = "compains";
    protected $fillable = ['name', "from", "to", "total", "daily_budget", "images"];
    protected $casts = [
        'images' => 'array'
    ]; 
}
