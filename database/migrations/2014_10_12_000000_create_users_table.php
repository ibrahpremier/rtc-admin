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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('phone')->unique();
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('role')->nullable();
            $table->string('poste_club')->nullable();
            $table->string('classification')->nullable();
            $table->string('adresse')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('date_naissance')->nullable();
            $table->timestamp('date_adhesion')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
