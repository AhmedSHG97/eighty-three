<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compains', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->date("from");
            $table->date("to");
            $table->float("total");
            $table->float("daily_budget");
            $table->json("images");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compains');
    }
}
