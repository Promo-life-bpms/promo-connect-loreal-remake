<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_quotes', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_order')->nullable();
            $table->timestamps();
        });

        Schema::create('global_quotes_has_quotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('global_quotes_id')->constrained('global_quotes');
            $table->foreignId('quote_id')->constrained('quotes');
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
        Schema::dropIfExists('global_quotes_has_quotes');
        Schema::dropIfExists('global_quotes');
    }
}
