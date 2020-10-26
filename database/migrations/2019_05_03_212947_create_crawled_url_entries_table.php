<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawledUrlEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawled_url_entries', function (Blueprint $table) {
            $table->unsignedInteger('crawled_url_id')->primary();
            $table->string('image', 191);
            $table->string('type', 191);
            $table->unsignedInteger('price');
            $table->float('price_per_meter', 8, 2);
            $table->enum('currency', ['EUR', 'USD', 'BGN']);
            $table->unsignedTinyInteger('space');
            $table->string('place', 191);
            $table->text('description');

            $table->foreign('crawled_url_id')->references('id')->on('crawled_urls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crawled_url_entries');
    }
}
