<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->date('date_of_birth');
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('blood_group');
            $table->longText('address');
            $table->foreignId('insurance_id')->nullable()->references('id')->on('insurances')->onDelete('cascade');
            $table->string('insurance_number')->nullable();
            $table->date('insurance_date')->nullable();
            $table->boolean('insurance_status')->nullable();
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
        Schema::dropIfExists('patients');
    }
}
