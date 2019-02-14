<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermTaxonomyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('term_taxonomy', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('term_id');
            $table->unsignedInteger('term_taxonomy_parent')->nullable();
            $table->string('term_taxonomy')->nullable();
            $table->string('term_taxonomy_description')->nullable();
            $table->unsignedInteger('count')->default(0);
            $table->unsignedTinyInteger('term_taxonomy_type')->default(0);
            $table->unsignedTinyInteger('term_taxonomy_status')->default(0);
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
        Schema::dropIfExists('term_taxonomy');
    }
}
