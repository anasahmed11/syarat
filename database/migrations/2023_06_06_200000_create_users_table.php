<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('type',['1','2'])->comment('1-manger, 2-employee');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('image')->nullable();
            $table->decimal('salary')->default(0);
            $table->bigInteger('department_id')
                ->nullable()
                ->constrained('departments','id')
                ->onDelete('cascade')

            ;
            $table->bigInteger('manager_id')
                ->nullable()
                ->constrained('users','id')
                ->onDelete('cascade')
            ;
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
