<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    public $primaryKey='package_id';
    protected $table='packages';
    protected $fillable = [
        'package_code','package_name','permalink','package_desc','feature_img','comunity_id'
    ];
    public function comunity(){
        return $this->belongsTo(Comunity::class,'comunity_id', 'comunity_id');
    }
    public function rates(){
        return $this->hasMany(Rates::class,'package_id', 'package_id');
    }


}
