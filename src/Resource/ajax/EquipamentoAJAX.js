function CarregarTipos(){

    $.ajax({
        type: 'post',
        url: BASE_URL_DATAVIEW('EquipamentoDV'),
        data: {
            consultar_tipo: 'ajx'
        },
        success: function(tipos){
            $("#tipo").html(tipos)
        }
    })
}

function CarregarModelos(){
    $.ajax({
        type: 'post',
        url: BASE_URL_DATAVIEW('EquipamentoDV'),
        data: {
            consultar_modelo: 'ajx'
        },
        success: function(modelos){
            $("#modelo").html(modelos)
        }
    })
}