<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudisUser extends Model
{
    use HasFactory;
    protected $table = "estudisuser";
    protected $primaryKey = "IdEstudiUser";
    protected $fillable = ["IdEstudi", "IdUsuari","AnyPromocio"];

    public function users(){
        return $this->belongsTo(User::class, 'IdUsuari');
    }
    public function estudis(){
        return $this->belongsTo(Estudis::class, 'IdEstudi');
    }
}
