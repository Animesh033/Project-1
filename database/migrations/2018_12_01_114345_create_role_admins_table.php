<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('role_id'); //laravel 5.7
            $table->unsignedInteger('admin_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('admin_id')->references('id')->on('admins');


            // $table->integer('role_id')->unsigned();
            // $table->integer('admin_id')->unsigned();
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
        Schema::dropIfExists('role_admins');
    }
}
