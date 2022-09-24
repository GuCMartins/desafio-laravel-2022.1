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
        Schema::create('championship_teams', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             // Produtos 
             $table->unsignedBigInteger('championship_id');
             $table->foreign('championship_id')->references('id')->on('championships')->onDelete('cascade');
             $table->unsignedBigInteger('team_id');
             $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};