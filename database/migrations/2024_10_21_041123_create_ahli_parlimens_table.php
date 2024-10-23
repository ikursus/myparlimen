<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gelaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        Schema::create('parti', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('color')->default('#000000');
            $table->timestamps();
        });

        Schema::create('ahli_parlimen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gelaran_id')->nullable();
            $table->unsignedBigInteger('jawatan_id');
            $table->unsignedBigInteger('parti_id');
            $table->string('blok', 20); // limitkan jumlah character 20
            $table->string('nama');
            $table->string('no_ic');
            $table->string('no_tel')->nullable();
            $table->string('jantina', 10); // limitkan character 10
            $table->string('email')->unique(); // unique data
            $table->string('photo')->nullable();
            $table->text('alamat')->nullable();
            $table->boolean('status')->default(0); // default value adalah 0/false
            $table->timestamps();

            $table->foreign('gelaran_id')->references('id')->on('gelaran')->nullOnDelete();
            $table->foreign('jawatan_id')->references('id')->on('jawatan')->onDelete('cascade');
            $table->foreign('parti_id')->references('id')->on('parti')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ahli_parlimens');
    }
};
