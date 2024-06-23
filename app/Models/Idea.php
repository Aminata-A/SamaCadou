<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    
    //  Les attributs qui sont assignables en masse.

    protected $fillable = [
        'title', 
        'description', 
        'category_id', 
        'status', 
        'name', 
        'email',
    ];

    // Relation avec l'utilisateur qui a soumis l'idée.


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //  Relation avec la catégorie à laquelle l'idée appartient.

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //  Relation avec les commentaires associés à cette idée.
  
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
