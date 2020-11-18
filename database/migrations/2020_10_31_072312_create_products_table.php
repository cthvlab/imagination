<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('description', 500)->nullable();
            $table->string('image')->nullable();
			$table->string('ip')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
		
		Schema::create('tags', function (Blueprint $table) {
			$table->id();
			$table->string('name')->nullable();
			$table->string('ip')->nullable();
			$table->timestamps();
		});
		
		Schema::create('product_tag', function (Blueprint $table) {
			$table->bigInteger('product_id')->unsigned()->nullable();
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
			$table->bigInteger('tag_id')->unsigned()->nullable();
			$table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
		});
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
		 Schema::drop('tags');
		 Schema::drop('product_tag');
    }
}