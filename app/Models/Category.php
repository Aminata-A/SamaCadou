<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //  Les attributs qui sont assignables en masse.
    protected $fillable = [
        'name',
    ];

    // Relation avec les idées associées à cette catégorie.
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
}
