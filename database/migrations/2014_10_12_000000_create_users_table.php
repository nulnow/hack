<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('age')->nullable();
            $table->string('description')->nullable();
            $table->string('img_scr')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('options_json')->default(\json_encode([
                'cinema' => 0,
                'food' => 0,
                'walking' => 0,
                'gender' => 'n',
                'lookingFor' => 'a',
                'coords' => [
                    "lat" => 59.93444135994904,
                    "lng" => 30.312168158691463
                ]
            ]));

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
