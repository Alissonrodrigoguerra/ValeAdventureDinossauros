<?php

class Carteirinha extends CI_Controller {

    public function __construct() {
        parent::__construct();
	   
		
		if (!$this->session->userdata('auth')) {
            
		
			redirect('painel/login');
		
		} else {
		
			$auth = $this->session->userdata('auth');
            $area = 'Painel ' . APP_NAME;
            if ($auth['area'] != $area) {
                redirect('painel/logout');
            }
		
		}
        $this->load->helper('painel2');
        $this->load->helper('session2');
        $this->load->helper('String2');


        define('TABELA_NOME', 'carteirinha');
        define('TABELA_ALIAS', 'Carteirinha');
        define('TABELA_ID', 'idCarteirinha');


        $this->load->model('delete_model');
        $this->load->model('insert_model');
        $this->load->model('update_model');
        $this->load->model('read_model');

    }

    public function index() {

        helperPainel2VerificaPermissao(TABELA_NOME, 'index');

        $data = array();
        $data['auth'] =   $this->session->auth;

        $data['view']['controller'] = array('name' => TABELA_NOME, 'alias' => TABELA_ALIAS);
        $data['view']['action'] = array('name' => 'index', 'alias' => 'Listar');

        $this->load->view('painel/' . TABELA_NOME . '/index', $data);
        //
    }

    public function cadastrar() {

        $data = array();
        $data['auth'] =   $this->session->auth;

        
        $data['view']['controller'] = array('name' => TABELA_NOME, 'alias' => TABELA_ALIAS);
        $data['view']['action'] = array('name' => 'cadastrar', 'alias' => 'Cadastar');


        $this->load->model('Read_model');
        $data['tabelas_grupos'] = $this->Read_model->index('tabelas_grupos');

         // Validação

         $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[3]|max_length[255]');
         $this->form_validation->set_rules('cpf', 'CPF', 'required');
         $this->form_validation->set_rules('rg', 'RG', 'required');
         $this->form_validation->set_rules('data_de_nascimento', 'Data_de_Nascimento', 'required');
         $this->form_validation->set_rules('email', 'E-mail', 'required');

        //  $this->form_validation->set_rules('tabelas_grupos', 'Grupos Tabelas', 'required');
        //  $this->form_validation->set_rules('VisivelNoMenu', 'Visivel No Menu', 'required');
      

         // Executa Validação

        if ($this->form_validation->run() == TRUE)
        {
            if( $this->input->post()){

               
                $data_insert_entity = array(


                    'nome'  => $this->input->post('nome'),
                    'cpf'  => helperString2limpar_texto($this->input->post('cpf')),
                    'rg'  => helperString2limpar_texto($this->input->post('rg')),
                    'data_de_nascimento'  => helperString2limpar_texto($this->input->post('data_de_nascimento')),
                    'sexo'  => $this->input->post('sexo'),
                    'email'  => $this->input->post('email'),
                    'rua'  => $this->input->post('rua'),
                    'bairro'  => $this->input->post('bairro'),
                    'cidade'  => $this->input->post('cidade'),
                    'estado'  => $this->input->post('estado'),
                    'cep'  => helperString2limpar_texto($this->input->post('cep')),
                    'numero'  => helperString2limpar_texto($this->input->post('numero')),
                    'telefone'  => helperString2limpar_texto($this->input->post('telefone')),
                    'cel'  => helperString2limpar_texto($this->input->post('cel')),
                    'status' => 0,

                    'ip' => $_SERVER['REMOTE_ADDR'],
                    'created_at' => time(),

                );

               
                if($this->insert_model->index(TABELA_NOME, $data_insert_entity)){

                    $this->session->set_flashdata('success', 'Registro gravado com sucesso.');
                    redirect(base_url('painel/' . TABELA_NOME));

                }else{

                    $this->session->set_flashdata('error', 'Ocorreu um erro ao gravar o registro.');
                    redirect(base_url('painel/' . TABELA_NOME));
                }

            }
        }



        $this->load->view('painel/' . TABELA_NOME . '/formulario', $data);

    }

    public function editar($id) {


        $data = array();
        $data['auth'] =   $this->session->auth;

        
        $data['view']['controller'] = array('name' => TABELA_NOME, 'alias' => TABELA_ALIAS);
        $data['view']['action'] = array('name' => 'editar', 'alias' => 'Editar');

        $data['view']['record'] = $this->read_model->select__id(TABELA_NOME, $id);

        $this->load->model('Read_model');
        $data['tabelas_grupos'] = $this->Read_model->index('tabelas_grupos');

       
        if( $this->input->post()){

            
    
                
            $data_update_entity = array(

                'nome'  => $this->input->post('nome'),
                'cpf'  => helperString2limpar_texto($this->input->post('cpf')),
                'rg'  => helperString2limpar_texto($this->input->post('rg')),
                'data_de_nascimento'  => helperString2limpar_texto($this->input->post('data_de_nascimento')),
                'sexo'  => $this->input->post('sexo'),
                'email'  => $this->input->post('email'),
                'rua'  => $this->input->post('rua'),
                'bairro'  => $this->input->post('bairro'),
                'cidade'  => $this->input->post('cidade'),
                'estado'  => $this->input->post('estado'),
                'cep'  => helperString2limpar_texto($this->input->post('cep')),
                'numero'  => helperString2limpar_texto($this->input->post('numero')),
                'telefone'  => helperString2limpar_texto($this->input->post('telefone')),
                'cel'  => helperString2limpar_texto($this->input->post('cel')),
                'status' => helperString2limpar_texto($this->input->post('status')),
                'user_agent'  => helperSession2GetValueOfArray('auth', 'idUsers'), 
                'ip' => $_SERVER['REMOTE_ADDR'],
                'created_at' => time(),

            );
          
           
            if ($this->db->update(TABELA_NOME, $data_update_entity, array(TABELA_ID => $id))) {

                $this->session->set_flashdata('success', 'Registro atualizado com sucesso.');

                redirect(base_url('painel/' . TABELA_NOME));
                //
            } else {

                $this->session->set_flashdata('error', 'Ocorreu um erro ao atualizar o registro.');

                redirect(base_url('painel/' . TABELA_NOME));
                //
            }
            //

        }



        $this->load->view('painel/' . TABELA_NOME . '/formulario', $data);

      
    }

    public function desativar($id) {


        
        $data = array();
        $data['auth'] =   $this->session->auth;

        
        $data['view']['controller'] = array('name' => TABELA_NOME, 'alias' => TABELA_ALIAS);
        $data['view']['action'] = array('name' => 'editar', 'alias' => 'Editar');

        $update = $this->read_model->select__id(TABELA_NOME, $id );

        if ($update['status'] == '1'){

            $data = array( 'status' => '0' );
       
        }else{

            $data = array( 'status' => '1' );
        }
        
        $this->update_model->index($id, TABELA_NOME, $data);

         redirect(base_url('painel/' . TABELA_NOME . '/'));

      
    }

    public function apagar($id) {
        
      
        $data = array();
        $data['auth'] =   $this->session->auth;

        
        $data['view']['controller'] = array('name' => TABELA_NOME, 'alias' => TABELA_ALIAS);
        $data['view']['action'] = array('name' => 'editar', 'alias' => 'Editar');
        $data['view']['record'] = $this->read_model->select__id(TABELA_NOME, $id);
        
      
        $this->delete_model->index($id, TABELA_NOME);
        
        redirect(base_url('painel/' . TABELA_NOME . '/'));
        
        
        
    }


    public function imprimir($id) {
        
      
        $data = array();
        $data['auth'] =   $this->session->auth;

        
        $this->load->helper('chillerlan');
        $this->load->helper('mpdf');

        $data['view']['controller'] = array('name' => TABELA_NOME, 'alias' => TABELA_ALIAS);
        $data['view']['action'] = array('name' => 'editar', 'alias' => 'Editar');
        $data['view']['record'] = $this->read_model->select__id(TABELA_NOME, $id);
        $link = base_url('carterinha/$id');
       
        $html = "<div>".gerador($link)."<br><b>Nome: </b>".$data['view']['record']['nome']."<br><b>RG: </b>".$data['view']['record']['rg']."<br><b>CPF: </b>".$data['view']['record']['cpf']."<br><b>Data de Nascimento: </b>".$data['view']['record']['data_de_nascimento']."<br><b>Ativo Desde: </b>".$data['view']['record']['created_at']."<br></div>";
        echo pdf($html);

        
    }


    public function consulta($id) {
        
      
        $data = array();
        $data['auth'] =   $this->session->auth;

        
        $this->load->helper('chillerlan');
        $this->load->helper('mpdf');

        $data['view']['controller'] = array('name' => TABELA_NOME, 'alias' => TABELA_ALIAS);
        $data['view']['action'] = array('name' => 'editar', 'alias' => 'Editar');
        $data['view']['record'] = $this->read_model->select__id(TABELA_NOME, $id);
        print($id);
        
    }

    public function datatable() {


        helperPainel2VerificaPermissao(TABELA_NOME, 'index');

        $this->load->helper('datatable2');

        $sTable = TABELA_NOME;

        $aColumns = array(TABELA_ID, 'Nome', 'cpf', 'rg', 'data_de_nascimento', 'cep', 'cidade', 'status');

        $sIndexColumn = TABELA_ID;

        $sLimit = "";
        if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
            $sLimit = "LIMIT " . intval($_GET['iDisplayStart']) . ", " . intval($_GET['iDisplayLength']);
        }

        $sOrder = "";
        if (isset($_GET['iSortCol_0'])) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
                if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
                    $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
                    " . ($_GET['sSortDir_' . $i] === 'asc' ? 'asc' : 'desc') . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }

        $sWhere = "";
        if (isset($_GET['sSearch']) && $_GET['sSearch'] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true") {
                    $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch']) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        }

        for ($i = 0; $i < count($aColumns); $i++) {
            if (isset($_GET['bSearchable_' . $i]) && $_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
            }
        }

         $sQuery = "
          SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
          FROM $sTable
          $sWhere
          $sOrder
          $sLimit
          "; 

        if (!$sWhere) {
            $sWhere = 'WHERE 1';
        }

        // $sQuery = "
        // SELECT SQL_CALC_FOUND_ROWS
        // a.idTabelas,
        // b.nome grupo,
        // a.nome,
        // a.alias,
        // a.icone,
        // a.posicao,
        // a.visivelNoMenu,
        // a.status status
        // FROM $sTable a,
        // tabelas_grupos b
        // $sWhere
        // AND a.idTabelas_grupos = b.idTabelas_grupos
        // $sOrder
        // $sLimit
        // ";

        $rResult = $this->db->query($sQuery) or helperDataTable2FatalError('MySQL Error: ' . $this->db->_error_message());

        $sQuery = "SELECT FOUND_ROWS()";
        $rResultFilterTotal = $this->db->query($sQuery) or helperDataTable2FatalError('MySQL Error: ' . $this->db->_error_message());
        $aResultFilterTotal = $rResultFilterTotal->result_array();
        $iFilteredTotal = $aResultFilterTotal[0];

        $sQuery = "
        SELECT COUNT(" . $sIndexColumn . ")
        FROM $sTable
        ";

        $rResultTotal = $this->db->query($sQuery) or helperDataTable2FatalError('MySQL Error: ' . $this->db->_error_message());
        $aResultTotal = $rResultTotal->result_array();
        $iTotal = $aResultTotal[0];

        $output = array(
            //"sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        foreach ($rResult->result_array() as $aRow) {
            $row = array();
            for ($i = 0; $i < count($aColumns); $i++) {
                $row[] = $aRow[$aColumns[$i]];
            }
            $output['aaData'][] = $row;
        }

        echo json_encode($output);

       
    }
}
