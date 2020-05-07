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

    echo form_dropdown($nome, $opcao, $selected);
    
    if(form_error($nome)){

        echo   "<div class='card-panel  red lighten-5'>";
        echo   form_error($nome);
        echo   "</div>";

    } 

    echo form_label($alias, $nome);

    echo "</div>";

}




?>