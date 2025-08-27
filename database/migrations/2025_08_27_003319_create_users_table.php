<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
            $table->increments('id');
			$table->char('cpf', 11)->unique()->nullable; //11 caracteres e obrigatório
            $table->string('name', 50);
			$table->char(' phone', 11);
			$table->date('birth')->nullalbe();
			$table->char('gender', 1)->nullable();
			$table->text('notes')->nullable();


			$table->string('email', 90)->unique();
			$table->string('password', 254)->nullable();

			//permissão
			$table->string('status')->default('active');
			$table->string('permission')->default('app.user');
			
			$table->rememberToken();
			$table->timestamps();
			$table->softDeletes();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table){

		});
		Schema::drop('users');
	}
};
