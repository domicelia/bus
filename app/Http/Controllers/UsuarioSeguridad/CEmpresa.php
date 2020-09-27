<?php

namespace App\Http\Controllers\UsuarioSeguridad;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\UsuarioSeguridad\MEmpresa;

use Image;

class CEmpresa extends Controller
{
    /**
     * Default constructor
     */
    public function __construct()
    { }

    /**
     * @return
     */
    public function index()
    {

        $mEmpresa = new MEmpresa();
        // $idUsuario = auth()->user()->id;

        $idUsuario = 1;

        $empresa = $mEmpresa->getInformacionEmpresaConIdUsuarioWeb($idUsuario);

        return view('admin/usuarioSeguridad/empresa/index')->with('empresa', $empresa);
    }

    /**
     * @param $request 
     * @return
     */
    public function editar(Request $request)
    {

        $this->validate($request, [
            'id' => 'required',
            'direccion' => 'required',
            'slogan' => 'required',
            'mision' => 'required',
            'contacto' => 'required',
            'vision' => 'required',
            'correo' => 'required'
        ]);

        $id = $_POST['id'];
        $direccion = $_POST['direccion'];
        $slogan = $_POST['slogan'];
        $mision = $_POST['mision'];
        $contacto = $_POST['contacto'];
        $vision = $_POST['vision'];
        $correo = $_POST['correo'];



        $empresa = new MEmpresa();

        $file = $request->file('logo');


        if ($file) {

            $random = str_random(10);
            $nombre = $random . '_' . $file->getClientOriginalName();

            //Local
            $path = public_path('uploads/' . $nombre);
            //Produccion
            // $path = base_path() . '/../public_html/uploads/' . $nombre;

            $url = '/uploads/' . $nombre;
            $image = Image::make($file->getRealPath());
            //dd($url);
            $image->fit('750', '750');
            $image->save($path);
            $image->encode('data-url');
            //dd($request);

            $empresa->setLogo($url);
        } else{
            $empresa->setLogo(null);
        }

        $empresa->setId($id);
        $empresa->setDireccion($direccion);
        $empresa->setSlogan($slogan);
        $empresa->setMision($mision);
        $empresa->setContacto($contacto);
        $empresa->setVision($vision);
        $empresa->setCorreo($correo);

        $empresa->editarEmpresa($empresa);


        /*$requestData = $request->all();
        
        Noticia::create($requestData);*/


        return redirect('empresa/index')->with('success', 'Empresa Actualizada con Exito');
    }
}
