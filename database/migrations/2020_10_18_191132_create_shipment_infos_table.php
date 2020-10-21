<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('ship_name');
            $table->string('ship_phone');
            $table->string('ship_email');
            $table->string('ship_address');
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
        Schema::dropIfExists('shipment_infos');
    }
}
