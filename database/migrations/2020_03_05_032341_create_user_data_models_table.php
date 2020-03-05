<?php
/**
 * Create Users Table.
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * CreateUserDataModelsTable class
 */
class CreateUserDataModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_users', function (Blueprint $table){
            // Columns
            $table->string('id', 100)->comment('User ID');
            $table->string('name', 50)->comment('User Name');
            $table->boolean('is_premium')
                ->default(false)
                ->comment('Premium User Flag: true=>premium, false=>not premium');

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
        Schema::dropIfExists('t_users');
    }
}
