<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monthe extends Model
{
    use HasFactory;
    protected $table="monthes";
    protected $fillable=['name','name_en'];

}
