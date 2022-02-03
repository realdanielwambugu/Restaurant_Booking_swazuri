<?php

Namespace App\Database\Migrations;

use Xcholars\Support\Proxies\Schema;

use Xcholars\Database\Schema\Blueprint;

class CreateCartTable
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table)
        {
            $table->id();

            $table->string('cart_id');

            $table->integer('recipe_id');

            $table->integer('user_id');

            $table->integer('quantity');

            $table->integer('total_cost');

            $table->string('status')->default('pending');

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
        Schema::drop('carts');
    }
}
