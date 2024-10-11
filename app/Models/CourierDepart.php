<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourierDepart extends Model
{
    use HasFactory;


    protected $fillable = [
        'numero',
        'date_env',
        'destinataire',
        'moyen',
        'reference',
        'frais',
        'objet',
        'observation'
    ];
}
