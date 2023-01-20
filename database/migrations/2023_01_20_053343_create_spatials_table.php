<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spatials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('village_id');
            $table->foreignId('type_id');
            $table->string('name')->default('Unnamed');
            $table->string('address')->default('Unaddressed');
            $table->decimal('latitude', $precision = 8, $scale = 5)->default(0.0);
            $table->decimal('longitude', $precision = 8, $scale = 5)->default(0.0);
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
        Schema::dropIfExists('spatials');
    }
};
