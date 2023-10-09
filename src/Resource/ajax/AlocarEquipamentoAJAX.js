function ListarEquipamentos() {

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('alocarEquipamentoDV'),
        data: {
            listar_equipamentos_alocacao: 'ajx',
        },
        success: function (dados) {
            $("#tableResult").html(dados);
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function FiltrarEquipamentosAlocacao() {

    let idTipo = $("#tipo").val();
    let idModelo = $("#modelo").val();

    $.ajax({
        beforeSend: function () {
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('alocarEquipamentoDV'),
        data: {
            listar_equipamentos_alocacao: 'ajx',
            tipo: idTipo,
            modelo: idModelo
        },
        success: function (dados) {
            $("#tableResult").html(dados);
        },
        complete: function () {
            RemoverLoad();
        }
    })
}

function InserirAlterarAlocacao(){

    let eqID = $("#equipamento_id").val();
    let setorID = $("#setor_id").val();
    let selectSetorID = $("#novo_setor_id").val();
alert($("#novo_setor_id").val());
    $.ajax({
        beforeSend: function(){
            Load();
        },
        type: 'post',
        url: BASE_URL_DATAVIEW('alocarEquipamentoDV'),
        data: {
            inserir_alterar_alocacao: 'ajx',
            equipamento_id: eqID,
            setor_id: setorID,
            novo_setor_id: selectSetorID
        },
        success: function(ret){
            FecharModal('#modalAloc');
            MostrarMensagem(ret);
            ListarEquipamentos();
        },
        complete: function(){
            RemoverLoad();
        }
    })
}