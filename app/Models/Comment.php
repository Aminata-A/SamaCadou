<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Les attributs qui sont assignables en masse.
    protected $fillable = [
        'name',
        'content', 
        'idea_id', 
    ];

    // Relation avec l'idée à laquelle le commentaire est associé.
    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }
}
