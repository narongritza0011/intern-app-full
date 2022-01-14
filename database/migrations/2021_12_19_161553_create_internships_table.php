<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('emp_id');
            $table->text('profile');
            $table->string('name_title');
            $table->string('full_name');
            $table->string('id_card_number');
            $table->string('phone');
            $table->string('line_id');
            $table->string('email_address');
            $table->string('address');
            $table->string('license');
            $table->string('major');
            $table->string('faculty');
            $table->string('university');
            $table->string('start_intern');
            $table->string('end_intern');
            $table->text('resume');
            $table->text('transcript');
            $table->text('social');
            $table->text('favorite');
            $table->text('skill');
            $table->string('introduce_yourself');
            $table->string('status');
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
        Schema::dropIfExists('internships');
    }
}
