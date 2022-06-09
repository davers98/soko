<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('productname');
            $table->text('description');
            $table->string('category');
            $table->integer('price');
            $table->integer('units');
            $table->binary('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::dropIfExists('products');
    }
};