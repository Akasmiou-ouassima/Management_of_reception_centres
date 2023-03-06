<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Centre extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    
    public function beneficiaires(){
        return $this->hasMany(Beneficiaire::class,'centre_id');   
    }
    public function users(){
        return $this->hasMany(User::class,'centre_id');   
    }
    public function services(){
        return $this->hasMany(Service::class,'centre_id');   
    }
}