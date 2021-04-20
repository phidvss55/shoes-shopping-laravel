<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ActiveStatus;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('od_transaction_id')->default(ActiveStatus::INACTIVE);
            $table->integer('od_product_id')->default(ActiveStatus::INACTIVE);
            $table->integer('od_sale')->default(ActiveStatus::INACTIVE);
            $table->tinyInteger('od_qty')->default(ActiveStatus::INACTIVE);
            $table->integer('od_price')->default(ActiveStatus::INACTIVE);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
