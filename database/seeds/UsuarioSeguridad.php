<?php

use App\Persona;
use App\Administrador;
use App\Empresa;
use App\Vendedor;

use Illuminate\Database\Seeder;

class UsuarioSeguridad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create();

        $persona = new Persona();
        $persona->photo = "";
        $persona->nombre = "Brayan";
        $persona->apellido= "Vera";
        $persona->fecha_nacimiento= "1995-23-06";
        $persona->genero = "masculino";
        $persona->contacto = "7887675";
        $persona->tipo_persona = "administrador";
        $persona->estado = 1;
        $persona->user_id = 1;
        $persona->save();

        $empresa = new Empresa();
        $empresa->logo="";
        $empresa->nombre="Bolivar";
        $empresa->direccion="Avenida Landivar - Santa Cruz";
        $empresa->slogan="Bolivar un viaje placentero";
        $empresa->mision="mision";
        $empresa->vision="vision";
        $empresa->contacto="7887676";
        $empresa->correo="bolivar@gmail.com";
        $empresa->estado=1;
        $empresa->save();

        $administrador = new Administrador();
        $administrador->cargo="administrador";
        $administrador->estado=1;
        $administrador->empresa_id=1;
        $administrador->persona_id=1;
        $administrador->save();

        $vendedor = new Vendedor();
        $vendedor->departamento="CB";
        $vendedor->estado=1;
        $vendedor->empresa_id=1;
        $vendedor->persona_id=1;
        $vendedor->save();

    }
}
