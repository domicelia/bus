<?php

namespace App\Models\UsuarioSeguridad;

use App\Persona;
use App\Models\UsuarioSeguridad\MUser;
use Exception;

/**
 * @author brayan
 */
class MPersona
{

    /**
     * 
     */

    private $id;
    private $photo;
    private $nombre;
    private $apellido;
    private $fechaNacimiento;
    private $genero;
    private $contacto;
    private $tipoPersona;

    private $user;



    /**
     * Default constructor
     */
    public function __construct($photo=null,$nombre=null,$apellido=null,$fechaNacimiento=null,$genero=null,$contacto=null,$tipoPersona=null,$mUser=null,$id=null)
    { 
        $this->id = $id;
        $this->photo= $photo;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->genero=$genero;
        $this->contacto = $contacto;
        $this->tipoPersona =  $tipoPersona;

        $this->user = $mUser;
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
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

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
     * Get the value of apellido
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set the value of apellido
     *
     * @return  self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get the value of fechaNacimiento
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set the value of fechaNacimiento
     *
     * @return  self
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

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
     * Get the value of tipoPpersona
     */
    public function getTipoPersona()
    {
        return $this->tipoPersona;
    }

    /**
     * Set the value of tipoPpersona
     *
     * @return  self
     */
    public function setTipoPersona($tipoPersona)
    {
        $this->tipoPersona = $tipoPersona;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param $idPersona 
     * @return
     */
    public function getPersonaId($idPersona)
    {

        try {
            $persona = new MPersona();

            $personaDB = Persona::findOrFail($idPersona);
           
            $persona->setId($personaDB->id);
            $persona->setPhoto($personaDB->photo);
            $persona->setNombre($personaDB->nombre);
            $persona->setApellido($personaDB->apellido);
            $persona->setFechaNacimiento($personaDB->fecha_nacimiento);
            $persona->setGenero($personaDB->genero);
            $persona->setContacto($personaDB->contacto);
            $persona->setTipoPersona($personaDB->tipo_persona);

            $mUser = new MUser();
            $user = $mUser->getUserIdUser($idPersona);

            $persona->setUser($user);


        }finally {
            return $persona;  
        }
    }


    /**
     * @param $mPersona 
     * @return
     */
    public function registrarPersona($mPersona)
    {

        $mUser = new MUser();

        $respuesta = false;


        if($mUser->registrarUser($mPersona->getUser())){

            $persona = new Persona();

            $persona->photo = $mPersona->getPhoto();
            $persona->nombre = $mPersona->getNombre();
            $persona->apellido = $mPersona->getApellido();
            $persona->fecha_nacimiento = $mPersona->getFechaNacimiento();
            $persona->genero = $mPersona->getGenero();
            $persona->contacto = $mPersona->getContacto();
            $persona->tipo_persona = $mPersona->getTipoPersona();
            $persona->estado = 1;
            $persona->user_id = $mUser->getId();
            $persona->save();

            self::setId($persona->id);
            
            $respuesta = true;

        }
        
        return $respuesta;

    }

    /**
     * @param $mPersona 
     * @return
     */
    public function editarPersona($mPersona)
    {

        $mUser = new MUser();

        $respuesta = false;


        if($mUser->editarUser($mPersona->getUser())){

            $persona = Persona::findOrFail($mPersona->getId());

            $persona->photo = $mPersona->getPhoto();
            $persona->nombre = $mPersona->getNombre();
            $persona->apellido = $mPersona->getApellido();
            $persona->fecha_nacimiento = $mPersona->getFechaNacimiento();
            $persona->genero = $mPersona->getGenero();
            $persona->contacto = $mPersona->getContacto();
            $persona->tipo_persona = $mPersona->getTipoPersona();
            $persona->save();
            
            $respuesta = true;

        }
        
        return $respuesta;

    }

     /**
     * @param $idPersona, $idUser
     * @return
     */
    public function darBajaPersona($idPersona,$idUser)
    {

        $mUser = new MUser();

        $respuesta = false;


        if($mUser->darBajaUser($idUser)){

            Persona::destroy($idPersona);
            
            $respuesta = true;

        }
        
        return $respuesta;

    }
}
