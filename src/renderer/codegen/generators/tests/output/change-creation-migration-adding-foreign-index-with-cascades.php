<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table
                ->bigInteger('id')
                ->unsigned()
                ->autoIncrement();
            $table
                ->bigInteger('user_id')
                ->unsigned()
                ->index();
            $table->bigInteger('tag_id')->unsigned();
            $table->string('title', 255);
            $table
                ->string('slug', 255)
                ->unique()
                ->index();
            $table->text('body');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique('slug');
            $table->index(['user_id', 'slug']);
            $table
                ->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
};
