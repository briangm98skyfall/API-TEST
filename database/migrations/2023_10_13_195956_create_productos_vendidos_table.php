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
        Schema::create('productos_vendidos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->float('precio');
            $table->string('categoria', 50);
            $table->string('tags', 100);
            $table->text('descripcion')->nullable();
            $table->text('infoAdicional')->nullable();
            $table->text('valoracion')->nullable();
            $table->integer('sku')->nullable()->unique();
            $table->string('url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_vendidos');
    }
};
