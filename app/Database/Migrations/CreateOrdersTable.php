<?php

Namespace App\Database\Migrations;

use Xcholars\Support\Proxies\Schema;

use Xcholars\Database\Schema\Blueprint;

class CreateOrdersTable
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table)
        {
            $table->id();

            $table->integer('user_id');

            $table->string('cart_id');

            $table->string('delivery_id');

            $table->integer('quantity');

            $table->string('payment_code');

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
        Schema::drop('users');
    }
}
