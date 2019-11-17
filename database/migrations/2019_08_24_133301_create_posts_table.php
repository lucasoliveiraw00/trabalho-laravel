<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->bigInteger('category_id')->unsigned()->index();
            $table->foreign('category_id')
                ->references('id')
                    ->on('categories')
                        ->onDelete('cascade');

            $table->string('title', 250);
            $table->text('description');
            $table->date('date');
            $table->string('image', 200)->nullable();
            $table->time('hour');
            $table->boolean('featured')->default(false);
            $table->enum('status', ['A', 'R'])->default('A')->comment('A-> Ativo postado, R-> Rascunho, não postado');
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
        Schema::dropIfExists('posts');
    }
}
