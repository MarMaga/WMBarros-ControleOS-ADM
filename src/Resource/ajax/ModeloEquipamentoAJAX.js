function CadastrarModeloEquipamento(formID){

    if(NotificarCampos(formID)){
        
        let modelo = $("#modelo").val();

        $.ajax({
            type: post,
            url: BASE_URL_DATAVIEW('ModeloEquipamentoDV'),
            data: {
                modelo: modelo,
                btn_cadastrar: 'ajx'
            },
            success: function(ret){
                MostrarMensagem(ret);
                LimparNotificacoes(formID);
            }
        })
    }
}