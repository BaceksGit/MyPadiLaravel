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
        Schema::table('feedback', function (Blueprint $table) {
            $table->text('feedback_reply')->nullable()->after('message');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('feedback', function (Blueprint $table) {
            $table->dropColumn('feedback_reply');
        });
    }

};
