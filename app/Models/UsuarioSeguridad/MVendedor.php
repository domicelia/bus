<?php
namespace App\Models\UsuarioSeguridad;

use App\Models\UsuarioSeguridad\MPersona;
use App\Vendedor;

use App\Herramientas\ArrayList;

/**
 * @author brayan
 */
class MVendedor {

    /**
     * 
     */
    
    private $id;
    private $departamento;
    private $persona;
    private $empresa;


    /**
     * Default constructor
     */
    public function __construct($departamento=null,$mPersona=null,$mEmpresa=null,$id=null) { 
        $this->id=$id;
        $this->departamento = $departamento;
        $this->persona = $mPersona;
        $this->empresa = $mEmpresa;
    }
    


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * Get the value of departamento
     */ 
    public function getDepartamento()
    {
        return $this->departamento;
    }

    /**
     * Set the value of departamento
     *
     * @return  self
     */ 
    public function setDepartamento($departamento)
    {
        $this->departamento = $departamento;

        return $this;
    }

    /**
     * Get the value of persona
     */ 
    public function getPersona()
    {
        return $this->persona;
    }

    /**
     * Set the value of persona
     *
     * @return  self
     */ 
    public function setPersona($persona)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Set the value of empresa
     *
     * @return  self
     */ 
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    /**
     * @param $idEmpresa 
     * @return
     */
    public function getListaVendedor($idEmpresa) {

        $vendedorDB = Vendedor::where('vendedor.empresa_id','=',$idEmpresa)->orderBy('id', 'desc')->get();

        $listaVendedor = new ArrayList;

        foreach ($vendedorDB as $vendedor) {

            $mVendedor = new MVendedor();

            $mVendedor->setId($vendedor->id);
            $mVendedor->setDepartamento($vendedor->departamento);

            $mPersona = new MPersona();
            $persona = $mPersona->getPersonaId($vendedor->persona_id);

            $mVendedor->setPersona($persona);

            $listaVendedor->Add($mVendedor);
        }

        return $listaVendedor;
    }

    /**
     * @param $MVendedor 
     * @return
     */
    public function registrarVendedor($mVendedor) {
        
       
        $mPersona = new MPersona();

        $respuesta = false;

        if($mPersona->registrarPersona($mVendedor->getPersona())){

            $vendedor = new Vendedor();
            $vendedor->departamento = $mVendedor->getDepartamento();
            $vendedor->empresa_id = $mVendedor->getEmpresa()->getId();
            $vendedor->persona_id = $mPersona->getId();
            $vendedor->estado = 1;
            $vendedor->save();

            $respuesta=true;
            
        }

        return $respuesta;
    }

    /**
     * @param $MVendedor 
     * @return
     */
    public function editarVendedor($mVendedor) {
       
        $mPersona = new MPersona();

        $respuesta = false;

        if($mPersona->editarPersona($mVendedor->getPersona())){

            $vendedor = Vendedor::findOrFail($mVendedor->getId());
            $vendedor->departamento = $mVendedor->getDepartamento();
            $vendedor->save();
            
            $respuesta=true;
            
        }

        return $respuesta;
    }

    /**
     * @param $idVendedor , $idPersona , $idUser
     * @return
     */
    public function darBajaVendedor($idVendedor,$idPersona,$idUser) {
        $mPersona = new MPersona();

        $respuesta = false;

        if($mPersona->darBajaPersona($idPersona,$idUser)){

            Vendedor::destroy($idVendedor);
            
            $respuesta=true;
            
        }

        return $respuesta;
    }

    /**
     * Get the value of empresa
     */ 
    public function getEmpresa()
    {
        return $this->empresa;
    }

    
}