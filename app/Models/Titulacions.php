<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacions extends Model
{
    use HasFactory;
    protected $table = 'titulacions';
    protected $primaryKey ='IdTitulacio';
    protected $fillable = ['nom'];

    public function ofertes(){
        return $this->belongsToMany(Ofertes::class, 'ofertestitulacions', 'IdTitulacio', 'IdOferta')->withTimestamps();
    }
}
