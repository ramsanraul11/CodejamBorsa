<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudis extends Model
{
    use HasFactory;
    protected $table = 'estudis';
    protected $primaryKey = 'IdEstudi';
    protected $fillable = ['nom'];

    public function estudisuser(){
        return $this->belongsTo(EstudisUser::class);
    }
}
