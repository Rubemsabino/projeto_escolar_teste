<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->string('email')->nullable()->after('rg');
            $table->string('email_responsavel')->nullable()->after('rg_responsavel');
        });
    }

    public function down()
    {
        Schema::table('alunos', function (Blueprint $table) {
            $table->dropColumn(['email', 'email_responsavel']);
        });
    }
};