<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disc', function (Blueprint $table) {
            $table->id('disc_id');
            $table->integer('package_id');
            $table->date('date_from');
            $table->date('date_end');
            $table->string('refferal_code', 45);
            $table->decimal('disc_percent', 10, 0);
            $table->decimal('disc_nominal', 10, 0);
            $table->decimal('min_transaction', 10, 0);
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
        //
    }
};
