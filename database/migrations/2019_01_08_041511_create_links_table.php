<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('link_owner')->nullable();
            $table->string('link_image')->nullable();
            $table->string('link_url')->nullable();
            $table->string('link_title')->nullable();
            $table->string('link_description')->nullable();
            $table->unsignedTinyInteger('link_target')->nullable();
            $table->unsignedInteger('link_order')->nullable();
            $table->unsignedTinyInteger('link_type')->default(0);
            $table->unsignedTinyInteger('link_status')->default(0);
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
        Schema::dropIfExists('links');
    }
}
