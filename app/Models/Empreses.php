<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empreses extends Model
{
    use HasFactory;
    protected $table = 'empreses';
    protected $primaryKey = 'IdEmpresa';
    protected $fillable = ['nom','email'];

    public function ofertes(){
        return $this->hasMany(Ofertes::class);
    }

}
