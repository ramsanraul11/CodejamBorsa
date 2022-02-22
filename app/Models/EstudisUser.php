<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudisUser extends Model
{
    use HasFactory;
    protected $table = "estudisuser";
    protected $primaryKey = ["IdEstudiUser"];
    protected $fillable = ["IdEstudi", "IdUsuari","AnyPromocio"];

    public function users(){
        return $this->hasMany(User::class);
    }
    public function estudis(){
        return $this->hasMany(Estudis::class);
    }
}
