<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique()->index();
            $table->text('orders');
            $table->string('address', 500);
            $table->string('email', 199);
            $table->string('number_phone', 50);
            $table->string('name', 500);
            $table->text('note')->nullable();
            $table->string('status')->default('PENDING');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
