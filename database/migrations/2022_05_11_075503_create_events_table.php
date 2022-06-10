<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_event_id');
            $table->foreignId('user_id');
            $table->string("title");
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('excerpt');
            $table->text('body');
            $table->smallInteger("priority");
            $table->string('location');
            $table->string('letter')->nullable();
            $table->date('date_at')->nullable();
            $table->timeTz('time_at')->nullable();
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
        Schema::dropIfExists('events');
    }
}
