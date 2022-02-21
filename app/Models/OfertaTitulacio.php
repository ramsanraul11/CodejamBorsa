<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfertaTitulacio extends Model
{
    use HasFactory;
    protected $table = "ofertestitulacions";
    protected $primaryKey = ["IdTitulacio", "IdOferta"];
    protected $fillable = ["IdTitulacio", "IdOferta"];
}
