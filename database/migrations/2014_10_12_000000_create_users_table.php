<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Ejecuta las migraciones.
     *$table->string('name'): Guarda el nombre del usuario.
     *$table->string('email')->unique(): Guarda el correo electrónico del usuario y asegura que sea único.
     *$table->timestamp('email_verified_at')->nullable(): Es opcional, utilizado si estás verificando el correo electrónico.
     *$table->string('password'): Guarda la contraseña del usuario (será cifrada).
     *$table->rememberToken(): Almacena el token de "recordarme" para la autenticación persistente.
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
