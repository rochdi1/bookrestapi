<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthorsToBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('author_book', function (Blueprint $table) {
         $table->foreign('author_id')->references('id')->on('author');
         $table->foreign('book_id')->references('id')->on('book');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_author', function (Blueprint $table) {
            $table->dropForeign(['author_id']);
            $table->dropCulomn('author_id');
            $table->dropForeign(['book_id']);
            $table->dropCulomn('book_id');
        });
    }
}
