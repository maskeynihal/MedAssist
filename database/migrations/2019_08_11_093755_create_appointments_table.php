<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id')->index(); //this column is used as foreign key in other table so it should be indexed
            // $table->foreign('userId')->references('userId')->on('users');
            // $table->index('userId');
            $table->string('hasAccount')->default(0);
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('department');
            $table->string('doctor');
            $table->date('date')->index();
            $table->string('time');
            $table->string('appointment_id');
            $table->foreign('appointment_id')->references('appointment_id')->on('doctor_availabilities');
            $table->string('adddescription')->default('No description');
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
        Schema::dropIfExists('appointments');
    }
}