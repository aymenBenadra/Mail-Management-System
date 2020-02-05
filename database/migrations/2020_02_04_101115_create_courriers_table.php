<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courriers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sender');
            $table->string('receiver');
            $table->string('subject');
            $table->text('corps');
            $table->text('comments');
            $table->string('object');
            $table->string('treater');
            $table->tinyInteger('urgency');
            $table->tinyInteger('status');
            $table->date('receptionDate');
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
        Schema::dropIfExists('courriers');
    }
}
