<?php

Namespace App\Database\Migrations;

use Xcholars\Support\Proxies\Schema;

use Xcholars\Database\Schema\Blueprint;

class CreateRecipesTable
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table)
        {
            $table->id();

            $table->string('photo')->default('food1.jpg');

            $table->string('name');

            $table->string('category');

            $table->string('price');

            $table->text('description');

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
        Schema::drop('recipes');
    }
}
