<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatsTable extends Migration
{
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fournisseur_id')->constrained('fournisseurs')->onDelete('restrict')->onUpdate('restrict');
            $table->date('date_facture'); // Date de la facture
            $table->string('reference_facture'); // Référence de la facture
            $table->string('nom_societe');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::table('achats', function (Blueprint $table) {
            $table->decimal('total', 8, 2)->change();
        });
            
    }
}


