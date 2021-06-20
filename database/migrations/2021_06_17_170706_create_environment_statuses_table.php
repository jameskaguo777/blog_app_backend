<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnvironmentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('environment_statuses', function (Blueprint $table) {
            $table->id();
            $table->text('note')->nullable();
            $table->text('media_url')->nullable();
            $table->point('coordinates')->nullable();
            $table->foreignId('health_emergency_id')->references('id')->on('health_emergencies');
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
        Schema::dropIfExists('environment_statuses');
    }
}
