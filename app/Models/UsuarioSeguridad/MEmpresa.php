<?php

namespace App\Models\UsuarioSeguridad;

use App\Empresa;

/**
 * @author brayan
 */
class MEmpresa
{

    /**
     * 
     */
    private $id;
    private $logo;
    private $nombre;
    private $direccion;
    private $slogan;
    private $mision;
    private $vision;
    private $contacto;
    private $correo;

    /**
     * Default constructor
     */
    public function __construct()
    { }


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
     * Get the value of logo
     */ 
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set the value of logo
     *
     * @return  self
     */ 
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

   

    /**
     * Get the value of direccion
     */ 
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */ 
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get the value of slogan
     */ 
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * Set the value of slogan
     *
     * @return  self
     */ 
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;

        return $this;
    }

    /**
     * Get the value of mision
     */ 
    public function getMision()
    {
        return $this->mision;
    }

    /**
     * Set the value of mision
     *
     * @return  self
     */ 
    public function setMision($mision)
    {
        $this->mision = $mision;

        return $this;
    }

    /**
     * Get the value of vision
     */ 
    public function getVision()
    {
        return $this->vision;
    }

    /**
     * Set the value of vision
     *
     * @return  self
     */ 
    public function setVision($vision)
    {
        $this->vision = $vision;

        return $this;
    }

    /**
     * Get the value of contacto
     */ 
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set the value of contacto
     *
     * @return  self
     */ 
    public function setContacto($contacto)
    {
        $this->contacto = $contacto;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    //Caso de Uso Empresa

     /**
     * @param $idEmpresa
     */
    public function getInformacionEmpresaConIdUsuarioWeb($idUsuario)
    {

        $empresaDB = Empresa::select("empresa.*")->join('administrador', 'empresa.id', '=', 'administrador.empresa_id')
            ->join('persona', 'administrador.persona_id', '=', 'persona.id')
            ->join('users', 'persona.user_id', '=', 'users.id')
            ->where('users.id', '=', $idUsuario)->get();

            foreach($empresaDB as $emp){

                $empresa = new MEmpresa();

                $empresa->setId($emp->id);
                $empresa->setLogo($emp->logo);
                $empresa->setNombre($emp->nombre);
                $empresa->setDireccion($emp->direccion);
                $empresa->setSlogan($emp->slogan);
                $empresa->setMision($emp->mision);
                $empresa->setVision($emp->vision);
                $empresa->setContacto($emp->contacto);
                $empresa->setCorreo($emp->correo);

            }

           // $empresa->setId($);

            
            return $empresa;
    }



    /**
     * @param $mEmpresa 
     * @return
     */
    public function editarEmpresa($mEmpresa)
    {
        
       $empresa = Empresa::findOrFail($mEmpresa->getId());
       
       if($mEmpresa->getLogo()){

        $empresa->logo = $mEmpresa->getLogo();
       
       }

    
       $empresa->direccion = $mEmpresa->getDireccion();
       $empresa->slogan = $mEmpresa->getSlogan();
       $empresa->mision = $mEmpresa->getMision();
       $empresa->contacto = $mEmpresa->getContacto();
       $empresa->vision = $mEmpresa->getVision();
       $empresa->correo = $mEmpresa->getCorreo();

        

       if($empresa->save()){
           $respuesta = true;
       }else{
           $respuesta = false;
       }

       return $respuesta;

    }

    //Caso de Uso Vendedor

    /**
     * @param $idUser 
     * @return
     */
    public function getIdEmpresaUserWeb($idUser) {
        
        $empresaDB = Empresa::select("empresa.*")->join('administrador', 'empresa.id', '=', 'administrador.empresa_id')
        ->join('persona', 'administrador.persona_id', '=', 'persona.id')
        ->join('users', 'persona.user_id', '=', 'users.id')
        ->where('users.id', '=', $idUser)->get();

        $idEmpresa = 0;

        foreach($empresaDB as $empresa){
            $idEmpresa = $empresa->id;
        }

        return $idEmpresa;


    }


}
