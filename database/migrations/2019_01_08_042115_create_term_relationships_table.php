<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_relationships', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('object_id');
            $table->unsignedInteger('term_taxonomy_id');
            $table->unsignedInteger('term_relationship_priority')->default(0);
            $table->unsignedTinyInteger('term_relationship_type')->default(0);
            $table->unsignedTinyInteger('term_relationship_status')->default(0);
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
        Schema::dropIfExists('term_relationships');
    }
}
