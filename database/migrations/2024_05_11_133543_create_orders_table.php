<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('order_id');
            $table->integer('product_id');
            $table->string('slug', 25);
            $table->integer('visitor_id');
            $table->integer('address_id');

            $table->string('quantity')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_price')->nullable();

            $table->text('order_notes')->nullable();

            $table->tinyInteger('status_id')->default(1)->comment('1 => Created, 2 => Shipped, 3 => Delivered, 4=>Cancelled, 5=>Returned ');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
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
