<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('dias_trabajados')->default(0);
            $table->decimal('sueldo_diario', 8, 2)->default(0.00);
            $table->decimal('sueldo', 10, 2)->default(0.00);
        });
    }

    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn('fecha_nacimiento');
            $table->dropColumn('dias_trabajados');
            $table->dropColumn('sueldo_diario');
            $table->dropColumn('sueldo');
        });
    }
};
