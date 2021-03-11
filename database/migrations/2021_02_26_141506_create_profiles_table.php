<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company', 50)->nullable();
            $table->string('position', 50)->nullable();
            $table->text('aboutMe')->nullable();
            $table->text('photo')->nullable();
            $table->boolean('hide')->default(0);

            $table->bigInteger('userId')->unsigned();
            $table->foreign('userId')->references('id')->on('members')
            ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
