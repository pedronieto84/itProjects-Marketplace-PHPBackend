<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->string('project_id')->primary();
            $table->string('owner_id')->nullable();
            $table->string('title')->nullable();
            $table->date('published_date')->nullable();
            $table->decimal('deadline')->nullable();
            $table->text('short_explanation')->nullable();
            $table->enum('state', ['accepted', 'published', 'refused', 'doing', 'finished'])->nullable();
            $table->decimal('bid')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
