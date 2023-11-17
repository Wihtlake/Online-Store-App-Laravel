<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
			Schema::table('users', function (Blueprint $table) {
				$table->boolean('email_subscribe')->default(false)->after('email');
			});
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
			Schema::table('users', function (Blueprint $table) {
				$table->dropColumn('email_subscribe');
			});
        });
    }
};
