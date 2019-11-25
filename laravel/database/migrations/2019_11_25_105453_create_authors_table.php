<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string("first_name", 100);
            $table->string("last_name", 100);
        });

        Schema::table('books', function (Blueprint $table) {
            $table->bigInteger("author_id")->unsigned();

            $table->foreign("author_id")->references("id")
                ->on("authors")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign("author_id");
        });

        Schema::dropIfExists('authors');
    }
}
