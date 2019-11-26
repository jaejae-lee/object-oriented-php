<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name", 30);
            $table->string("online");
        });

        Schema::create("book_shop", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("book_id")->unsigned();
            $table->foreign("book_id")->references("id")
                  ->on("books")->onDelete("cascade");

            $table->bigInteger("shop_id")->unsigned();
            $table->foreign("shop_id")->references("id")
                  ->on("shops")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_shop', function(Blueprint $table){
            $table->dropForeign("shop_id");
            $table->dropForeign("book_id");
        });

        Schema::dropIfExists('book_shop');
        Schema::dropIfExists('shops');
    }
}


