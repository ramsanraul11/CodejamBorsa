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
        return $this->belongsTo(Empreses::class, 'IdEmpresa');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'enviaments', 'IdOferta', 'IdUsuari')->withTimestamps();
    }

    public function estudis()
    {
        return $this->belongsToMany(Estudis::class, 'ofertesestudis', 'IdOferta', 'IdEstudi')->withTimestamps();
    }
}
