<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); //id of user //unsignedInteger=>values from 1 to infinity. no negative number

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//Since user_id is from users table id column, we have to use foreign() // references() for column name // on() for table name // onDelete('cascade') means delete this post record, if the user is deleted

            $table->string('content');
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
        Schema::dropIfExists('posts');
    }
}
