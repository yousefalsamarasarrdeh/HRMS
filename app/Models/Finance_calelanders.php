<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance_calelanders extends Model
{
    use HasFactory;
    protected $table="finance_calelanders";
    protected $fillable=['FINANCE_YR', 'FINANCE_YR_DESC', 'start_date', 'end_date', 'is_open', 'com_code', 'added_by', 'updated_by', 'created_at', 'updated_at'];


    public function user(){
        return $this->belongsTo('App\Models\Admin','added_by');
    }

    public function added(){
        return $this->belongsTo('App\Models\Admin','added_by');
    }

}
