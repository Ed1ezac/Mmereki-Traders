<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo', 255)->nullable();
            $table->foreignId('user_id');
            $table->text('intro');
            $table->enum('verification', ['verified', 'pending'])->default('pending');
            $table->text('about')->nullable();
            $table->string('email');
            $table->string('location');
            $table->string('address');
            $table->string('telephone');
            $table->string('mobile');
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
        Schema::dropIfExists('companies');
    }
}
