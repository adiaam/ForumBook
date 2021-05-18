<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            //Foreign key
            $table->unsignedBigInteger('user_id');
            $table->string('title')->nullable();//nullable means NULL in MySql
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            //adding index to easy and refrences search(normalerweise wir fügen INDEX für Fremdschlüssel)
            $table->index('user_id');
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            // the foreign key
            $table->unsignedBigInteger('user_id');
            $table->string('caption');
            $table->string('image');
            $table->timestamps();

            //adding index
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('posts');
    }
}
