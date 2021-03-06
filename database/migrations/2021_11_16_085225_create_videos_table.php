<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('channel_id')
                ->constrained()
                ->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('path')->nullable();
            $table->boolean('processed')->default(false);
            $table->string('processed_file')->nullable();
            $table->enum('visibility', ['private', 'public', 'unlisted'])->default('private');
            $table->boolean('allow_likes')->default(false);
            $table->boolean('allow_comments')->default(false);
            $table->string('processing_percentage')->default(false);
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
        Schema::dropIfExists('videos');
    }
}
