<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_columns', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('card_id');
            $table->string('column_id', 1);

            $table->boolean('is_marked')->default(false);
            $table->unsignedInteger('number');

            $table->timestamps();

            $table->foreign('card_id')
                ->references('id')->on('cards')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('column_id')
                ->references('id')->on('columns')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_columns');
    }
}
