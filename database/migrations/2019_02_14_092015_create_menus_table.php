<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('menu_title');
            $table->string('menu_slug');
            $table->string('menu_icon');
            $table->string('menu_entry');
            $table->unsignedInteger('menu_order')->default(0);
            $table->unsignedInteger('menu_parent')->default(0);
            $table->unsignedTinyInteger('menu_type')->default(0);
            $table->unsignedTinyInteger('menu_status')->default(0);
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
        Schema::dropIfExists('menus');
    }
}
