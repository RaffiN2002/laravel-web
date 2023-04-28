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
        Schema::create('background', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type',['experience','education']);
            $table->date('start');
            $table->date('end')->nullable();
            $table->string('info1')->nullable();
            $table->string('info2')->nullable();
            $table->string('info3')->nullable();
            $table->text('content');
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
        Schema::dropIfExists('background');
    }
};
