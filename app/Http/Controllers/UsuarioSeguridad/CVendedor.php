<?php

namespace App\Http\Controllers\UsuarioSeguridad;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UsuarioSeguridad\MEmpresa;
use App\Models\UsuarioSeguridad\MVendedor;

//Es lo que necesita el metodo
use App\Models\UsuarioSeguridad\MPersona;
use App\Models\UsuarioSeguridad\MUser;

class CVendedor extends Controller
{
    
    /**
     * Default constructor
     */
    public function __construct() {
    }

    /**
     * @return
     */
    public function index() {
        
        $mVendedor = new MVendedor();
        $mEmpresa = new MEmpresa();
        // $idUsuario = auth()->user()->id;

        $idUsuario = 1;

        $idEmpresa = $mEmpresa->getIdEmpresaUserWeb($idUsuario);
        
        $listaVendedor = $mVendedor->getListaVendedor($idEmpresa);

        // dd($listaVendedor);

        return view('admin/usuarioSeguridad/vendedor/index')->with('listaVendedor', $listaVendedor);
    }

    /**
     * @param $request 
     * @return
     */
    public function registrar(Request $request) {
        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'fechaNacimiento' => 'required',
            'genero' => 'required',
            'departamento' => 'required',
            'contacto' => 'required',
            'correo' => 'required',
            'password' => 'required'
        ]);

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $genero = $_POST['genero'];
        $departamento = $_POST['departamento'];
        $contacto = $_POST['contacto'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        // dd($nombre);
        $mEmpresa = new MEmpresa();
        // $idUsuario = auth()->user()->id;
        $idUsuario = 1;

        $mEmpresa = $mEmpresa->getInformacionEmpresaConIdUsuarioWeb($idUsuario);

        $mVendedor = new MVendedor();
        if($mVendedor->registrarVendedor(new MVendedor($departamento,new MPersona("sin foto",$nombre,$apellido,$fechaNacimiento,$genero,$contacto,"trabajador",new MUser($nombre,$correo,$password)),$mEmpresa))){
            $mensaje = "Vendedor Creado Con Exito";
        }else{
            $mensaje = "Error al Crear Vendedor";
        }

        return redirect('vendedor/index')->with('success', $mensaje);

    }

    /**
     * @return
     */
    public function editar(Request $request) {
        $this->validate($request, [
            'idVendedor' => 'required',
            'idPersona' => 'required',
            'idUser' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'fechaNacimiento' => 'required',
            'genero' => 'required',
            'departamento' => 'required',
            'contacto' => 'required',
            'correo' => 'required',
            'password' => 'required'
        ]);

        $idVendedor = $_POST['idVendedor'];
        $idUser = $_POST['idUser'];
        $idPersona = $_POST['idPersona'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fechaNacimiento = $_POST['fechaNacimiento'];
        $genero = $_POST['genero'];
        $departamento = $_POST['departamento'];
        $contacto = $_POST['contacto'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        // dd($nombre);
        $mEmpresa = new MEmpresa();
        // $idUsuario = auth()->user()->id;
        $idUsuario = 1;

        $mEmpresa = $mEmpresa->getInformacionEmpresaConIdUsuarioWeb($idUsuario);

        $mVendedor = new MVendedor();
        
        if($mVendedor->editarVendedor(new MVendedor($departamento,new MPersona("sin foto",$nombre,$apellido,$fechaNacimiento,$genero,$contacto,"trabajador",new MUser($nombre,$correo,$password,$idUser),$idPersona),$mEmpresa,$idVendedor))){
            $mensaje = "Vendedor Editado Con Exito";
        }else{
            $mensaje = "Error al Editar Vendedor";
        }

        return redirect('vendedor/index')->with('success', $mensaje);
    }

    /**
     * @return
     */
    public function darBaja(Request $request) {
        $this->validate($request, [
            'idVendedor' => 'required',
            'idPersona' => 'required',
            'idUser' => 'required',
        ]);

        $idVendedor = $_POST['idVendedor'];
        $idUser = $_POST['idUser'];
        $idPersona = $_POST['idPersona'];

        $mVendedor = new MVendedor();

        
        if($mVendedor->darBajaVendedor($idVendedor,$idPersona,$idUser)){
            $mensaje = "Vendedor dada de Baja con exito";
        }else{
            $mensaje = "Error al dar de Baja";
        }

        return redirect('vendedor/index')->with('success', $mensaje);

       
    }
}
