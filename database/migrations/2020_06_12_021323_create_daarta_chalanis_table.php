<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaartaChalanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daarta_chalanis', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('type')->nullable();
            $table->string('daarta_number')->nullable();
            $table->string('chalani_number')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('subject')->nullable();
            $table->string('sender')->nullable();
            $table->string('fiscalyear')->nullable();
            $table->string('date')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('service_type')->nullable();
            $table->unsignedBigInteger('branch_type')->nullable();
            $table->foreign('branch_type')->references('id')->on('branches')->onDelete('cascade');
            $table->string('branch_type_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('upload_file')->nullable();
            $table->tinyInteger('published')->default(0)->nullable();

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
        Schema::dropIfExists('daarta_chalanis');
    }
}
