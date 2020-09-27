<?php
namespace App\Models\UsuarioSeguridad;

use App\User;

/**
 * @author brayan
 */
class MUser {

    /**
     * 
     */
    private $id;
    private $name;
    private $email;
    private $password;



    /**
     * Default constructor
     */
    public function __construct($name=null,$email=null,$password=null,$id=null) {
        $this->id=$id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @param $idPersona 
     * @return
     */
    public function getUserIdUser($idPersona) {
        try {
            
            $mUser = new MUser();

            $userDB = User::select('users.*')->join('persona','users.id','=','persona.user_id')
                            ->where('persona.id','=',$idPersona)->get();
           
            foreach($userDB as $user){    
                $mUser->setId($user->id);
                $mUser->setName($user->name);
                $mUser->setEmail($user->email);
            }

        }finally {
            // dd($userDB);
            return $mUser;  
        }
    }

    /**
     * @param $mUser 
     * @return
     */
    public function registrarUser($mUser) {

        $respuesta = false;

        if(!self::existeCorreo($mUser->getEmail())){

            $user = new User();
            $user->name = $mUser->getName();
            $user->email = $mUser->getEmail();
            $user->password = $mUser->getPassword();
            // $user->password_confirmation = $mUser->getPassword();
            $user->save();

            self::setId($user->id);

            $respuesta=true;

           

        }

        return $respuesta;

    }

    /**
     * @param $mUser 
     * @return
     */
    public function editarUser($mUser) {

        try{
            $respuesta = false;

            $user = User::findOrFail($mUser->getId());
            $user->name = $mUser->getName();
            $user->email = $mUser->getEmail();
            $user->password = $mUser->getPassword();
            $user->save();
            
            $respuesta=true;

        }finally{
            return $respuesta;
        }
    }

    /**
     * @param $correo 
     * @return
     */
    public function existeCorreo($correo) {
        $respuesta = false;
        $user = User::where('email','=',$correo);

        if($user->exists()){
            $respuesta=true;
        }

        return $respuesta;
        
    }

     /**
     * @param $idUser
     * @return
     */
    public function darBajaUser($idUser) {

        try{
            $respuesta = false;

           
            User::destroy($idUser);
          
            $respuesta=true;

        }finally{
            return $respuesta;
        }
    }



}