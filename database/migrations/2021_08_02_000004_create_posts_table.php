<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->longText('body');
            $table->longText('body_ar')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('excerpt_ar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
