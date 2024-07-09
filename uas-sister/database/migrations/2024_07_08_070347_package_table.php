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
        {
            Schema::create('packages', function (Blueprint $table) {
                $table->id('package_id');
                $table->string('package_code', 10);
                $table->string('package_name', 100);
                $table->string('permalink', 100);
                $table->text('package_desc');
                $table->string('feature_img', 45);
                $table->integer('comunity_id');
                $table->timestamps();
            });
        }
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
