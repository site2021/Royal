<?php

Class Acl {
   
    private $db;
    private $user_empty = false;
    private $server = "127.0.0.1";
	private $user = "root";
	private $pass = "sitesas";
	private $bd = "ryl";

    //initialize the database object here
    function __construct( $conexion ) {
        //include 'conex.php';
        //$this->db = mysqli_connect($server,$user,$pass,$bd);
        $this->db = $conexion;
    }
    
    function check($permission,$userid,$group_id) {
        //we check the user permissions first
        If(!$this->user_permissions($permission,$userid)) {
            return false;  
        }
        
        if(!$this->group_permissions($permission,$group_id) & $this->IsUserEmpty()) {
            return false;
        }
        
        return true;
    }

    function user_permissions($permission,$userid) {
        // Comprobamos conxexión
        if ( $this->db->connect_error) {
            exit("Fallo al conectar a MySQL: " .  $this->db->connect_error);
        } 

        

       //$resultado = $this->db->query("SELECT COUNT(*) AS count FROM user_permissions WHERE permission_name='$permission' AND userid='$userid' ");
        mysqli_set_charset($this->db, "utf8");
        $sql = "SELECT * FROM tbcontratos";
        if(!$result = mysqli_query($this->db, $sql)) die();
       
         $usuarios = array(); //creamos un array

         while($row = mysqli_fetch_array($result)) 
         {  print_r($row);die;
             $id=$row['id'];
             
             $usuario=$row['usuario'];
             $clave=$row['clave'];
             $nombre=$row['nombre'];
             $perfil=$row['perfil'];
             $estado=$row['estado'];
             $ciudad=$row['ciudad'];
            
             $usuarios[] = array('id'=>$id, 'usuario'=>$usuario, 'clave'=>$clave, 'nombre'=>$nombre, 'perfil'=>$perfil, 'estado'=>$estado, 'ciudad'=>$ciudad );
            
         }
            
         //desconectamos la base de datos
         $close = mysqli_close($this->db) 
         or die("Ha
          sucedido un error inexperado en la desconexion de la base de datos");
        

       $f = $this->db->f();
       print_r($f);die;
       If($f['count']>0) {
           $this->db->q("SELECT * FROM user_permissions WHERE permission_name='$permission' AND userid='$userid' ");
           $f = $this->db->f();

           If($f['permission_type']==0) {
               return false;
            }
            
            return true;
        }
        
        $this->setUserEmpty('true');
        
        return true;   
    }
    
    function group_permissions($permission,$group_id) {
        $this->db->q("SELECT COUNT(*) AS count FROM group_permissions WHERE permission_name='$permission' AND group_id='$group_id' ");
        
        $f = $this->db->f();
        
        if($f['count']>0) {
           $this->db->q("SELECT * FROM group_permissions WHERE permission_name='$permission' AND group_id='$group_id' ");
        
           $f = $this->db->f();
           
           If($f['permission_type']==0) {
               return false;
            }
             
             return true;
         }
         
         return true;
    }
    
    function setUserEmpty($val) {
        $this->userEmpty = $val;
    }

    function isUserEmpty() {
        return $this->userEmpty;
    }
}
?>