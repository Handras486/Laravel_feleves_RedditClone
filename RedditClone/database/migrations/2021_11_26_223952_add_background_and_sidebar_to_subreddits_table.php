<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBackgroundAndSidebarToSubredditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subreddits', function (Blueprint $table) {
            $table->longText('sidebar')->nullable();
            $table->string('bgimage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subreddits', function (Blueprint $table) {
            $table->dropColumn('sidebar');
            $table->dropColumn('bgimage');
        });
    }
}
