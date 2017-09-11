<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relations', function (Blueprint $table) {
            $table->string('source_name', 225);
            $table->string('source_id', 225);
            $table->string('target_name', 225);
            $table->string('target_id', 225);
            $table->longText('data')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->index(['source_name', 'source_id', 'target_name', 'target_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relations');
    }
}
