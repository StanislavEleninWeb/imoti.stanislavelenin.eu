<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrawledUrlRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawled_url_ratings', function (Blueprint $table) {
            $table->unsignedInteger('crawled_url_id')->primary();
            $table->float('rating', 4, 1)->default(0);
            $table->float('rating_price', 4, 1)->default(0);
            $table->float('rating_price_per_meter', 4, 1)->default(0);
            $table->float('rating_space', 4, 1)->default(0);
            $table->float('rating_keywords', 4, 1)->default(0);

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
        Schema::dropIfExists('crawled_url_ratings');
    }
}
