<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('employees', function(Blueprint $table) {
			$table->foreign('role_id')->references('id')->on('roles')
						->onDelete('set null')
						->onUpdate('restrict');
		});
		Schema::table('options', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('options', function(Blueprint $table) {
			$table->foreign('attribute_id')->references('id')->on('attributes')
						->onDelete('no action')
						->onUpdate('no action');
		});
		Schema::table('order', function(Blueprint $table) {
			$table->foreign('emp_id')->references('id')->on('employees')
						->onDelete('set null')
						->onUpdate('set null');
		});
		Schema::table('take_away_orders', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('order')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('take_away_orders', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('delivery_orders', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('order')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('delivery_orders', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('delivery_orders', function(Blueprint $table) {
			$table->foreign('emp_id')->references('id')->on('employees')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('inplace_orders', function(Blueprint $table) {
			$table->foreign('table_id')->references('id')->on('tables')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('inplace_orders', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('order')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('order_products', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('order')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('order_products', function(Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('order_options', function(Blueprint $table) {
			$table->foreign('order_id')->references('id')->on('order')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('order_options', function(Blueprint $table) {
			$table->foreign('option_id')->references('id')->on('options')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('employees', function(Blueprint $table) {
			$table->dropForeign('employees_role_id_foreign');
		});
		Schema::table('options', function(Blueprint $table) {
			$table->dropForeign('options_product_id_foreign');
		});
		Schema::table('options', function(Blueprint $table) {
			$table->dropForeign('options_attribute_id_foreign');
		});
		Schema::table('order', function(Blueprint $table) {
			$table->dropForeign('order_emp_id_foreign');
		});
		Schema::table('take_away_orders', function(Blueprint $table) {
			$table->dropForeign('take_away_orders_order_id_foreign');
		});
		Schema::table('take_away_orders', function(Blueprint $table) {
			$table->dropForeign('take_away_orders_user_id_foreign');
		});
		Schema::table('delivery_orders', function(Blueprint $table) {
			$table->dropForeign('delivery_orders_order_id_foreign');
		});
		Schema::table('delivery_orders', function(Blueprint $table) {
			$table->dropForeign('delivery_orders_user_id_foreign');
		});
		Schema::table('delivery_orders', function(Blueprint $table) {
			$table->dropForeign('delivery_orders_emp_id_foreign');
		});
		Schema::table('inplace_orders', function(Blueprint $table) {
			$table->dropForeign('inplace_orders_table_id_foreign');
		});
		Schema::table('inplace_orders', function(Blueprint $table) {
			$table->dropForeign('inplace_orders_order_id_foreign');
		});
		Schema::table('order_products', function(Blueprint $table) {
			$table->dropForeign('order_products_order_id_foreign');
		});
		Schema::table('order_products', function(Blueprint $table) {
			$table->dropForeign('order_products_product_id_foreign');
		});
		Schema::table('order_options', function(Blueprint $table) {
			$table->dropForeign('order_options_order_id_foreign');
		});
		Schema::table('order_options', function(Blueprint $table) {
			$table->dropForeign('order_options_option_id_foreign');
		});
	}
}