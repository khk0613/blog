<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeletedToPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // posts table에 deleted 컬럼 추가
        Schema::table('posts', function ($table) {
            $table->boolean('deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // posts table에서 deleted 컬럼 삭제
        Schema::table('posts', function ($table) {
            $table->dropColumn('deleted');
        });
    }
}
