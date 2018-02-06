<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pedido extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->date('data');
            $table->double('sub_total');
            $table->double('desconto_total');
            $table->double('total');
            
            $table->foreign('cliente_id')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('pedido_produto', function (Blueprint $table) {
            $table->integer('cliente_id')->unsigned();
            $table->integer('produto_id')->unsigned();
            $table->double('quantidade');
            $table->double('valor_unitario');
            $table->double('desconto');
            $table->double('valor_total');
            
            $table->foreign('cliente_id')
                    ->references('id')
                    ->on('clientes')
                    ->onDelete('cascade');
            $table->foreign('produto_id')
                    ->references('id')
                    ->on('produtos')
                    ->onDelete('cascade');
            $table->primary(array('cliente_id', 'produto_id'));
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
        Schema::dropIfExists('pedido_produto');
        Schema::dropIfExists('pedidos');
    }
}
