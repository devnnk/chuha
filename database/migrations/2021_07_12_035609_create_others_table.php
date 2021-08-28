<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOthersTable extends Migration
{
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('status')->default('open');
            $table->string('type')->default('footer');
            $table->integer('position')->default(1000);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('others');
    }
}
