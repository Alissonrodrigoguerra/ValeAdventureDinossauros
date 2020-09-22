<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Users_Model
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class TabelasAlterar_carteirinha extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();

    $this->load->dbforge();

  }

  public function up()
  {
    // 
   $this->load->helper('construct_table_helper');	
   $data = array();

   $user = "carteirinha";
   helperconstruct_table_insert_fields( $user,'Nome','longtext',Null);
   helperconstruct_table_insert_fields( $user,'cpf','int','11',Null);
   helperconstruct_table_insert_fields( $user,'rg','int','9',Null);
   helperconstruct_table_insert_fields( $user,'data_de_nascimento','date',Null,Null);
   helperconstruct_table_insert_fields( $user,'sexo','varchar','255',Null);
   helperconstruct_table_insert_fields( $user,'email','varchar','255',Null);
   helperconstruct_table_insert_fields( $user,'senha','varchar','255',Null);
   helperconstruct_table_insert_fields( $user,'hash','varchar','255',Null);
   helperconstruct_table_insert_fields( $user,'cep','varchar','15',Null);
   helperconstruct_table_insert_fields( $user,'rua','varchar','255',Null);
   helperconstruct_table_insert_fields( $user,'numero','int','10',Null);
   helperconstruct_table_insert_fields( $user,'bairro','varchar','255',Null);
   helperconstruct_table_insert_fields( $user,'cidade','varchar','255',Null);
   helperconstruct_table_insert_fields( $user,'estado','varchar','255',Null);
   helperconstruct_table_insert_fields( $user,'telefone','int','10',Null);
   helperconstruct_table_insert_fields( $user,'cel','int','11',Null);

 


   echo "tabela ".$user." criada com sucesso!";

  }
    

  public function down(){
   
   $user = "carteirinha";
   $this->dbforge->drop_table($user, TRUE);
   echo 'Database deleted!';


  }
  
}


/* End of file Users_Model.php */
/* Location: ./application/controllers/Users_Model.php */