<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('mid');
            $table->string('title', 225);
            $table->integer('parent')->default(0)->index();
            $table->string('menu_name', 55)->index();
            $table->string('url', 255);
            $table->binary('option')->nullable();
            $table->integer('weight')->default(0);
            $table->smallInteger('depth')->nullable();
            $table->tinyInteger('has_children')->nullable();
            $table->tinyInteger('expanded')->default(1);
            $table->integer('p1')->nullable()->comment('The first mid in the materialized path. If N = depth, then pN must equal the mlid. If depth > 1 then p(N-1) must equal the parent link mlid. All pX where X > depth must equal zero. The columns p1 .. p5 are also called the parents.');
            $table->integer('p2')->nullable()->comment('The second mlid in the materialized path. See p1');
            $table->integer('p3')->nullable()->comment('The second mlid in the materialized path. See p1');
            $table->integer('p4')->nullable()->comment('The second mlid in the materialized path. See p1');
            $table->integer('p5')->nullable()->comment('The second mlid in the materialized path. See p1');
            $table->tinyInteger('status')->default(1);
            
            $table->index(['mid', 'parent', 'url', 'has_children', 'p1', 'p2', 'p3', 'p4', 'p5']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
