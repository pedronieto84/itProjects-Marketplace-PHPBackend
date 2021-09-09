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
            $table->string('project_id', 20)->primary();
            $table->string('owner_id', 20);
            $table->string('title', 100);
            $table->date('published_date');
            $table->decimal('deadline');
            $table->text('short_explanation');
            $table->enum('state', ['accepted', 'published', 'refused', 'doing', 'finished']);
            $table->decimal('bid');
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
