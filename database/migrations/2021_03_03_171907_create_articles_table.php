<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ActiveStatus;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('a_name')->unique();
            $table->string('a_slug')->index();
            $table->tinyInteger('a_hot')->default(ActiveStatus::INACTIVE);
            $table->tinyInteger('a_status')->default(ActiveStatus::ACTIVE);
            $table->integer('a_menu_id')->index()->default(0);
            $table->integer('a_view')->default(0);
            $table->string('a_description')->nullable();
            $table->string('a_avatar')->nullable();
            $table->string('a_content')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
