<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        //
        Schema::table('users', function(blueprint $table){
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //
        Schema::table('users', function(blueprint $table){
            $table->dropColumn('deleted_at');
        });
    }
};
