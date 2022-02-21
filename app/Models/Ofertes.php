<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ofertes extends Model
{
    use HasFactory;
    protected $table = 'ofertes';
    protected $primaryKey ='IdOferta';
    protected $fillable = ['descripcio', 'pendentEnviament'];

    public function empreses(){
        return $this->belongsTo('App\Models\Empreses');
    }

    public function titulacions(){
        return $this->belongsToMany(Titulacions::class, 'ofertestitulacions', 'IdTitulacio', 'IdOferta')->withTimestamps();
    }

    public function ofertaenviaments()
    {
        return $this->belongsToMany(User::class, 'enviaments', 'IdUsuari', 'IdOferta')->withTimestamps();
    }
}
