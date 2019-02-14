<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term_title');
            $table->string('term_slug')->nullable();
            $table->string('term_icon')->nullable();
            $table->string('term_entry')->nullable();
            $table->unsignedInteger('term_group')->default(0);
            $table->unsignedTinyInteger('term_type')->default(0);
            $table->unsignedTinyInteger('term_status')->default(0);
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
        Schema::dropIfExists('terms');
    }
}
