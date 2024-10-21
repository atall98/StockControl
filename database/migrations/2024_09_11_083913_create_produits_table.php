<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->integer('reference')->notNull();
            $table->string('libelle', 255)->notNull();
            $table->text('description')->nullable();
            $table->decimal('prix_achat', 10, 2)->notNull();
            $table->decimal('prix_vente', 10, 2)->notNull();
            $table->integer('quantite')->notNull();
            $table->integer('quantite_alerte')->notNull();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
