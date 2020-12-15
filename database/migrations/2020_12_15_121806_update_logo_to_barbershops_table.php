<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLogoToBarbershopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('barbershops', function (Blueprint $table) {
            $table->string("logo")->nullable()->change();
        });
    }
    // https://stackoverflow.com/a/65075035/5832341

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('barbershops', function (Blueprint $table) {
            $table->string("logo")->nullable(false);
        });
    }
}
