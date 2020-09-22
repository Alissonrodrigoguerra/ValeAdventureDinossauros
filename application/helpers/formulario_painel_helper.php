<?php

function input_text($nome, $alias, $icon= Null, $record= Null){

    echo "<div class='input-field col s12 '". (form_error($nome) ? ' has-error' : null).">";
    echo $icon;

    $data = array(
        'type'  => 'text',
        'name'  => $nome,
        'id'    => $nome,
        'value' => (set_value($nome) ? set_value($nome) : (isset($record) ? $record : null)),
        'class' => 'hiddenemail'
    );
    echo form_input($data);

    echo form_label($alias, $nome);

    if(form_error($nome)){

        echo   "<div class='card-panel  red lighten-5'>";
        echo   form_error($nome);
        echo   "</div>";

    } 
    echo "</div>";

};



function input_numero($nome, $alias, $icon= Null, $record= Null){

    echo "<div class='input-field col s12 '". (form_error($nome) ? ' has-error' : null).">";

    echo $icon;
    $data = array(
        'type'  => 'number',
        'name'  => $nome,
        'id'    => $nome,
        'value' => (set_value($nome) ? set_value($nome) : (isset($record) ? $record : null)),
        'class' => 'hiddenemail'
    );
    echo form_input($data);
    echo form_label($alias, $nome);

    if(form_error($nome)){

        echo   "<div class='card-panel  red lighten-5'>";
        echo   form_error($nome);
        echo   "</div>";

    } 
    echo "</div>";

};


function select_options($nome, $alias, $opcao, $icon = Null, $record= Null){
   
    echo "<div class='input-field col s12 '". (form_error($nome) ? ' has-error' : null).">";
   
    echo $icon;
    // $selected = set_value($nome) ? set_value($nome) : (isset($view['record'][$nome]) ? $view['record'][$nome] : '0');
    if(!empty($record)){

        $selected = $record;

    }else{

        $selected = $opcao;

    }

    $extra['id'] = $nome;

    echo form_dropdown($nome, $opcao, $selected, $extra);
    
    if(form_error($nome)){

        echo   "<div class='card-panel  red lighten-5'>";
        echo   form_error($nome);
        echo   "</div>";

    } 

    echo form_label($alias, $nome);

    echo "</div>";

}


function select_options_estado($nome, $alias, $opcao, $icon = Null, $record= Null){
   
    echo "<div class='input-field col s12 '". (form_error($nome) ? ' has-error' : null).">";
   
    // echo $icon;
    // $selected = set_value($nome) ? set_value($nome) : (isset($view['record'][$nome]) ? $view['record'][$nome] : '0');
    if(!empty($record)){

        $selected = $record;

    }else{

        $selected = $opcao;

    }

    $extra['id'] = $nome;

    // echo form_dropdown($nome, $opcao, $selected, $extra);

    // echo form_label($alias, $nome);

    echo"<select  id='".$nome."' class='browser-default' name='".$nome."'>";
        if('AC' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="AC">Acre</option>';
        if('AL' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="AL">Alagoas</option>';
       if('AP' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="AP">Amapá</option>';
       if('AM' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="AM">Amazonas</option>';
       if('BA' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="BA">Bahia</option>';
       if('CE' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="CE">Ceará</option>';
       if('DF' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="DF">Distrito Federal</option>';
       if('ES' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="ES">Espírito Santo</option>';
       if('GO' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="GO">Goiás</option>';
       if('MA' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="MA">Maranhão</option>';
       if('MT' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="MT">Mato Grosso</option>';
       if('MS' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="MS">Mato Grosso do Sul</option>';
       if('MG' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="MG">Minas Gerais</option>';
       if('PA' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="PA">Pará</option>';
       if('PB' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="PB">Paraíba</option>';
       if('PR' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="PR">Paraná</option>';
       if('PE' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="PE">Pernambuco</option>';
       if('PI' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="PI">Piauí</option>';
       if('RJ' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="RJ">Rio de Janeiro</option>';
       if('RN' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="RN">Rio Grande do Norte</option>';
       if('RS' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="RS">Rio Grande do Sul</option>';
       if('RO' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.'value="RO">Rondônia</option>';
       if('RR' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="RR">Roraima</option>';
       if('SC' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="SC">Santa Catarina</option>';
       if('SP' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="SP">São Paulo</option>';
       if('SE' == $record){  $select = 'selected';}else{ $select = "";}
        echo'<option '.$select.' value="SE">Sergipe</option>';
       if('TO' == $record){ $select = 'selected'; }else{ $select = "";}
        echo'<option '.$select.' value="TO">Tocantins</option>';
    echo"</select>";
    
    if(form_error($nome)){

        echo   "<div class='card-panel  red lighten-5'>";
        echo   form_error($nome);
        echo   "</div>";

    } 


    echo "</div>";

}



function input_file($nome, $record= Null, $tabela = null, $mutiple = null){
    
    echo "<div class='file-field input-field col s12  '". (form_error($nome) ? ' has-error' : null).">";
 
    $data = array(
        'type'  => 'text',
        'name'  => $nome,
        'id'    => $nome,
    );
   
    echo "<div class='btn cyan waves-light'>";
    echo "<span>".$data['name']."</span>";
    echo "<input name='".$data['name']."' type='file' ".$mutiple.">";
    echo "</div>";
    echo "<div class='file-path-wrapper col s12'>";
    echo "<input class='file-path validate' type='text'>";
    echo "</div>";
    if(form_error($data['name'])){

        echo   "<div class='card-panel  red lighten-5'>";
        echo   form_error($data['name']);
        echo   "</div>";

    } 
    if($record != Null){
        echo "<img src='".base_url()."assets/uploads/".$tabela."/".$record."' alt='".$nome."' style='width:150px; margin-bottom:20px; ; margin-left: -015px;'>";
        echo "<br>";
    }
    echo "</div>";

   

};



function input_text_area($nome, $alias, $icon= Null, $record= Null){

    echo "<div class='input-field col s12 '". (form_error($nome) ? ' has-error' : null).">";
    echo $icon;

    $data = array(
        'type'  => 'text',
        'name'  => $nome,
        'id'    => $nome,
        'value' => (set_value($nome) ? set_value($nome) : (isset($record) ? $record : null)),
        'class' => 'materialize-textarea'
    );
    echo form_textarea($data);

    echo form_label($alias, $nome);

    if(form_error($nome)){

        echo   "<div class='card-panel  red lighten-5'>";
        echo   form_error($nome);
        echo   "</div>";

    } 
    echo "</div>";

};

?>