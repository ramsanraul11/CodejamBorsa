<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class OfertesEstudis extends Model
{
    use HasFactory;
    protected $table = "ofertesestudis";
    protected $primaryKey = ["IdOfertaEstudi"];
    protected $fillable = ["IdEstudi", "IdOferta"];
}
