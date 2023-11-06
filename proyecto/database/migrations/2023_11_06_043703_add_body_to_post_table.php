<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    public function up()
    {
        Schema::table('post', function (Blueprint $table) {
            // agrega la columna 'body' despues de la columna 'tittle'
            $table->longText('body')->after('title');
        });
    }
    public function down()
    {
        Schema::table('post', function (Blueprint $table) {
            $table->dropColumn('body');
        });
    }
};
