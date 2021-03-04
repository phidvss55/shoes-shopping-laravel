<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ActiveStatus;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mn_name')->unique();
            $table->string('mn_slug')->index();
            $table->string('mn_avatar')->nullable();
            $table->string('mn_banner')->nullable();
            $table->string('mn_description')->nullable();
            $table->tinyInteger('mn_hot')->default(ActiveStatus::INACTIVE);
            $table->tinyInteger('mn_status')->default(ActiveStatus::ACTIVE);
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
        Schema::dropIfExists('menus');
    }
}
