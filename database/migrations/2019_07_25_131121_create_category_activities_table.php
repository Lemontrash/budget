<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categoryId');
            $table->text('activityName');
            $table->integer('userId');
            $table->integer('amount_of_money');
            $table->enum('currency', ['USD', 'EUR', 'GBP', 'UAH', 'RUB']);
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
        Schema::dropIfExists('category_activities');
    }
}
