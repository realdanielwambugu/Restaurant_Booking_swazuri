<?php

Namespace App\Database\Migrations;

use Xcholars\Support\Proxies\Schema;

use Xcholars\Database\Schema\Blueprint;

class ModifyRecipesTable01
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('recipes', function (Blueprint $table)
        {
            $table->string('category_id')->after('name');
        });
    }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {

    }
}
