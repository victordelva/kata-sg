<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('contract1_id');
            $table->foreign('contract1_id')
                ->references('id')->on('contracts');
            $table->unsignedBigInteger('contract2_id');
            $table->foreign('contract2_id')
                ->references('id')->on('contracts');
            $table->integer('winner')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trials');
    }
}
