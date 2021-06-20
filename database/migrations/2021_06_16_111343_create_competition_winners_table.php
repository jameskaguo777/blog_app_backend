<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_winners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_winnerable_id');
            $table->string('competition_winnerable_type');
            $table->integer('total_votes')->nullable();
            $table->foreignId('competition_id')->references('id')->on('competitions');
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
        Schema::dropIfExists('competition_winners');
    }
}
