<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->foreignId('centre_id')->constrained('centres')->cascadeOnDelete();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->string('services_bénéficier');
            $table->integer('âge');
            $table->date('date_de_naissance');
            $table->string('sexe');
            $table->string('situation_familiale');
            $table->string('état_sanitaire');
            $table->date('date_entrée');
            $table->date('date_sortie')->nullable();
            $table->string('remarques');
            $table->string('photo');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiaires');
    }
};
