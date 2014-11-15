<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NamespaceTaskFields extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
          Schema::table('tasks', function($table) {
            $table->renameColumn('task', 'taskName');
            $table->renameColumn('duedate', 'taskDueDate');
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
            $table->renameColumn('taskName', 'task');
            $table->renameColumn('taskDueDate', 'duedate');
          });
	}

}
