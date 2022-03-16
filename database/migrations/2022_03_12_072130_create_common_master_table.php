<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommonMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_masters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('common_type', 100);
            $table->string('common_code', 100);
            $table->boolean('common_default')->default('0');
            $table->string('display_name', 500);
            $table->text('common_string1')->nullable();
            $table->text('common_string2')->nullable();
            $table->text('common_string3')->nullable();
            $table->float('common_num1', 12, 0)->nullable();
            $table->float('common_num2', 12, 0)->nullable();
            $table->float('common_num3', 12, 0)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['common_type', 'common_code']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('common_master');
    }
}
