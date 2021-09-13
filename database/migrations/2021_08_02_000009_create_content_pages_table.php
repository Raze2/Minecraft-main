<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentPagesTable extends Migration
{
    public function up()
    {
        Schema::create('content_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->longText('page_text')->nullable();
            $table->longText('page_text_ar')->nullable();
            $table->longText('excerpt')->nullable();
            $table->longText('excerpt_ar')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
