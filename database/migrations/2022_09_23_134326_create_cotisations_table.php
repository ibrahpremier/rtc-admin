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
        Schema::create('cotisations', function (Blueprint $table) {
            $table->id();
            $table->integer("janvier")->default(0);
            $table->integer("fevrier")->default(0);
            $table->integer("mars")->default(0);
            $table->integer("avril")->default(0);
            $table->integer("mai")->default(0);
            $table->integer("juin")->default(0);
            $table->integer("juillet")->default(0);
            $table->integer("aout")->default(0);
            $table->integer("septembre")->default(0);
            $table->integer("octobre")->default(0);
            $table->integer("novembre")->default(0);
            $table->integer("decembre")->default(0);
            $table->integer("per_capitat")->default(0);
            $table->foreignId("user_id");
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
        Schema::dropIfExists('cotisations');
    }
};
