<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIllusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('illusions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('illusion_owner');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->text('excerpt')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('content');
            $table->unsignedInteger('illusion_order')->nullable();
            $table->unsignedTinyInteger('illusion_type')->default(0);
            $table->unsignedTinyInteger('illusion_status')->default(0);
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
        Schema::dropIfExists('illusions');
    }
}
