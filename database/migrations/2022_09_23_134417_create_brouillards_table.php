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
        Schema::create('brouillards', function (Blueprint $table) {
            $table->id();
            $table->integer("solde_initial");
            $table->string("designation");
            $table->integer("montant");
            $table->string("type");
            $table->integer("solde");
            $table->foreignId("mandat_id");
            $table->foreignId('admin_id')->constrained('users');
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
        Schema::dropIfExists('brouillards');
    }
};
