<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img_path')->nullable(false);
            $table->string('name')->nullable(false);
            $table->string('height')->nullable(false);
            $table->string('width')->nullable(false);
            $table->string('length')->nullable(false);
            $table->string('release_day')->nullable(false);
            $table->integer('color_id')->nullable(false);
            $table->integer('category_id')->nullable(false);
            $table->integer('plan_id')->nullable(false);
            $table->unsignedBigInteger('master_id');
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
        Schema::dropIfExists('items');
    }
}
