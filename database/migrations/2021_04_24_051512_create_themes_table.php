<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->longText('logo')->nullable();
            $table->longText('facebook')->nullable();
            $table->longText('youtube')->nullable();
            $table->longText('pinterest')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('flickr')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('description')->nullable();
            $table->longText('footer_credit')->nullable();
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
        Schema::dropIfExists('themes');
    }
}
