<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;  

use function Psy\sh;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->integer('CI')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('nacimiento');
            $table->string('sexo')->unique();
            $table->integer('numero')->unique();  
            $table->timestamps();
        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
