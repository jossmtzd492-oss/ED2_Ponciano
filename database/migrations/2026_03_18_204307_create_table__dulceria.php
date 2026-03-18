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
        Schema::create('dulceria', function (Blueprint $table) {
            $table->id(); //Id del alumento
            $table->string("Nombre"); //Nombre del alimento
            $table->boolean("Disponibilidad"); //Estado o disponibilidad
            $table->double("Precio",10,2);
            $table->text("Descripcion");
            $table->string("TipoAlimento");
            $table->string("Categoria");
            $table->integer("Stock");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dulceria');
    }
};
