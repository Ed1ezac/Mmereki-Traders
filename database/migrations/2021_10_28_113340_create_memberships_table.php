<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('company_id');
            $table->enum('type', ['Trial', 'Standard', 'Professional'] )->default("Trial");
            $table->integer('billing')->default("0");
            $table->enum('status', ['active','expired','elevated','disabled'])->default("active");
            $table->date('expiry');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
}
