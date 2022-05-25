<?php



use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('category');
            $table->text('catdescription');
            $table->string('swacategory');
            $table->string('swacatdescription');
            $table->timestamps();
        });
    }

    public function down()
    {
        schema::dropIfExists('categories');
    }
};
