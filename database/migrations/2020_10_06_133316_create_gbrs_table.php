<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGbrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gbrs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Group_id')->unique();
            $table->string('TableID')->unique();
            $table->string('Description');
            $table->string('category');
            $table->bigInteger('status_id');
            $table->string('reason');
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
        Schema::dropIfExists('gbrs');
    }
}
