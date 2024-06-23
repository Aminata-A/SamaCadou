<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('name'); // nom de celui qui fait le commentaire
            $table->text('content'); // Contenu du commentaire
            $table->foreignId('idea_id')->constrained()->onDelete('cascade'); // Clé étrangère pour lier à l'idée à laquelle le commentaire est associé
            $table->timestamps(); // Ajout des timestamps pour le suivi de la création et de la mise à jour
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
