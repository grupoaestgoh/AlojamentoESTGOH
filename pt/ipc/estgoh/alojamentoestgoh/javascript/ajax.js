
$('#emailindex').live('change', function() {
    //pedido ajax na página index para email
    $.ajax({
        url: "?????.php", //nome do ficheiro php
        data: {
            'email' : $('#emailindex').val()
        },
        dataType: 'json',
        success: function(data) {
            if(data.result) {
                alert('Email existe!'); //resultado se existir, alert=teste;
            }
            else {
                alert('Email não existe!'); //resultado se não existir, alert=teste;
            }
        },
        error: function(data){
            alert('Ocorreu um erro!');//erro, alert=teste;
        }
    });
});

//possivel codigo php para meter no outro ficheiro depois:

/*

include("./comum/carregacontroladores.php");
include './utilizadores/DAOUtilizadore.php';

$mybd=new BaseDados();
$mybd->ligar_bd();

$DaoUtilizadores=new DAOUtilizadores();

if($DaoUtilizadores->verificar_email($_POST['emailindex']){
  $response->result = true;
}else{
  $response->result = false;
}

echo json_encode($response);

*/
