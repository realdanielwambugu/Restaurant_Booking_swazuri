<?php

Namespace App\Database\Migrations;

use Xcholars\Support\Proxies\Schema;

use Xcholars\Database\Schema\Blueprint;

class ModifyCategoryTable01
{
   /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table)
        {
            $table->text('description')->after('name');
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
