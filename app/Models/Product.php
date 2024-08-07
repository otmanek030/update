<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Définir la table associée si elle n'est pas le pluriel du nom du modèle
    protected $table = 'products';

    // Définir les attributs qui sont assignables en masse
    protected $fillable = [
        'name',
        'photo',
        'price',
    ];

    // Définir les attributs qui doivent être cachés lors de la conversion en tableau ou JSON
    protected $hidden = [
        // Ajoutez les attributs que vous voulez cacher
    ];

    // Définir les attributs qui devraient être mutés en dates
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}

