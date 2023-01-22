<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('folder_id')->unsigned();
            $table->string('title', 100);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('status')->default(1); //未着手:1,作業中:2,完了:3
            $table->timestamps();
            
            $table->foreign('folder_id')->references('id')->on('folders'); //外部キー制約の追加
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
