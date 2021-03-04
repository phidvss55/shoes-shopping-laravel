<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ActiveStatus;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pro_name')->unique();
            $table->string('pro_slug')->index();
            $table->integer('pro_price')->default(0);
            $table->integer('pro_number')->default(0)->comment('Tổng số lượng còn');
//            $table->integer('pro_price_entry')->default(0)->comment('Giá nhập');
            $table->integer('pro_category_id')->default(0);
            $table->integer('pro_admin_id')->default(0);
            $table->tinyInteger('pro_sale')->default(0);
            $table->string('pro_avatar')->nullable();
            $table->integer('pro_view')->default(0);
            $table->integer('pro_pay')->default(0);
            $table->mediumText('pro_description')->nullable();
            $table->text('pro_content')->nullable();
            $table->tinyInteger('pro_hot')->default(ActiveStatus::INACTIVE);
            $table->tinyInteger('pro_active')->default(ActiveStatus::ACTIVE);
            $table->integer('pro_review_total')->default(0);
            $table->integer('pro_review_star')->default(0);
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
        Schema::dropIfExists('products');
    }
}
