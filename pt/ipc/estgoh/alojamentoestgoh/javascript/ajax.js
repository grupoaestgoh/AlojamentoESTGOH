$('#inlineFormInputGroup').blur( function() {
    //pedido ajax para email
    var data = {
      "email": $('#inlineFormInputGroup').val()
    };
    data = $(this).serialize() + "&" + $.param(data);
    $.ajax({
        url: './ajax.php', //nome do ficheiro php
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(data) {
            if(data=='1') {
              $('img[src="./img/img_aplicacao/certo.png"]').attr('src','./img/img_aplicacao/rcross.png');
              //resultado se existir, alert=teste;
            } else {
              $('img[src="./img/img_aplicacao/rcross.png"]').attr('src','./img/img_aplicacao/certo.png');
              //resultado se não existir, alert=teste;
            }
        },
        error: function(data){
        }
    });
});
