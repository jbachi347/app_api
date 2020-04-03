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

            $table->id();
            $table->bigInteger('client_id')->unsigned();
            $table->string('name')->nullable()->default('');
            $table->text('description')->nullable();
            $table->float('amount')->nullable()->default(0);
            $table->float('payment')->nullable()->default(0);
            $table->float('due')->nullable()->default(0);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');

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
