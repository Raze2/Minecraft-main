<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('subject');
            $table->unsignedBigInteger('creator_id');
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('assign_id')->nullable();
            $table->foreign('assign_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['open','closed','permanently'])->default('open');
            $table->boolean('answerd')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
