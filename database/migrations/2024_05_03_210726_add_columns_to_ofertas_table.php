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
        Schema::table('ofertas', function (Blueprint $table) {
            $table->string('titulo');
            $table->string('empresa');
            $table->string('ubicacion');
            $table->text('descripcion');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('modalida_id')->constrained()->onDelete('cascade');
            $table->text('requerimientos');
            $table->foreignId('horario_id')->constrained()->onDelete('cascade');
            $table->string('imagen');
            $table->integer('publicado')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ofertas', function (Blueprint $table) {
            $table->dropForeign('ofertas_horario_id_foreign');
            $table->dropForeign('ofertas_modalida_id_foreign');
            $table->dropForeign('ofertas_salario_id_foreign');
            $table->dropForeign('ofertas_user_id_foreign');
            $table->dropColumn(['titulo', 'empresa', 'ubicacion', 'descripcion', 'salario_id', 'modalida_id', 'requerimientos', 'horario_id', 'imagen', 'publicado', 'user_id']);
        });
    }
};
