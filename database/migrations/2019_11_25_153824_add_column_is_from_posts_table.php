<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIsFromPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /**
     * 
     * This migration for add column to table ['posts']
     * Steps:
     *  1- in up method will add table like always
     *  2- in down method will use [dropColumn] method
     * 
     *      */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->boolean('is_admin')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->dropColumn('is_admin');
        });
    }
}
