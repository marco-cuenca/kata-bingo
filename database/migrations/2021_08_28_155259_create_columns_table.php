<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns', function (Blueprint $table) {
            $table->string('id', 1)->primary();
            $table->unsignedInteger('lower_limit');
            $table->unsignedInteger('upper_limit');

            $table->timestamps();
        });

        DB::table('columns')->insert([
            [
                'id' => 'B',
                'lower_limit' => '1',
                'upper_limit' => '15',
            ],
            [
                'id' => 'I',
                'lower_limit' => '16',
                'upper_limit' => '30',
            ],
            [
                'id' => 'N',
                'lower_limit' => '31',
                'upper_limit' => '45',
            ],
            [
                'id' => 'G',
                'lower_limit' => '46',
                'upper_limit' => '60',
            ],
            [
                'id' => 'O',
                'lower_limit' => '61',
                'upper_limit' => '75',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('columns');
    }
}
