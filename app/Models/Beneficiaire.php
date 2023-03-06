<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beneficiaire extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['nom','prenom','âge','date_de_naissance','sexe','situation_familiale','état_sanitaire','date_entrée','date_sortie','cin','services_bénéficier','remarques','photo'];
    use SoftDeletes;
    public function centre(){
        return $this->belongsTo(Centre::class);
    }

}
