<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title_admin');
            $table->string('title_login');
            $table->string('dashboard');
            $table->string('category');
            $table->string('ticket');
            $table->string('transaction');
            $table->string('report');
            $table->string('user');
            $table->string('setting');
            $table->string('my_profile');
            $table->string('change_password');
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
        Schema::dropIfExists('settings');
    }
}
