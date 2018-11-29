<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('isbn')->unique();
            $table->string('title'); 
            $table->date('published'); 
            $table->string('subtitle');
            $table->integer('rating');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
          //  $table->integer('author_id')->unsigned()->after('id');
          //  $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
