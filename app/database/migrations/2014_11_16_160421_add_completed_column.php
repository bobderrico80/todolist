<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompletedColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
          Schema::table('tasks', function($table) {
            $table->boolean('taskComplete')->default(false);
          });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
          Schema::table('tasks', function($table) {
            $table->dropcolumn('taskComplete');
          });
	}

}
