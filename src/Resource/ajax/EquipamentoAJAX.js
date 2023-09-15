function CadastrarEquipamentoAJAX(formID){

    if(NotificarCampos(formID)){

        let tipo = $("#tipo").val();
        let modelo = $("#modelo").val();
        let identificacao = $("#identificacao").val();
        let descricao = $("#descricao").val();

        $.ajax({
            type: "post",
            url: BASE_URL_DATAVIEW("EquipamentoDV"),
            data: {
                tipo: tipo,
                modelo: modelo,
                identificacao: identificacao,
                descricao: descricao,
                btn_cadastrar: "ajx"
            },
            success: function(ret){
                MostrarMensagem(ret);
                $("#modelo").trigger("focus");
            }
        })
        
    }
}