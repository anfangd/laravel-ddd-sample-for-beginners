<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_circles', function (Blueprint $table) {
            // Columns
            $table->string('id', 100)->comment('Circle ID');
            $table->string('name', 50)->comment('Circle Name');
            $table->boolean('owner_id', 100)->comment('User ID of Owner');
            $table->json('members')->comment('UserIDs of Members');

            // Table Feature.
            $table->primary('id');
            $table->index('id');
            $table->unique('name');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_circles');
    }
}
