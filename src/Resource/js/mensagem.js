function MostrarMensagem(ret) {
    switch (ret) {
        case -3:
            toastr.warning('Registro já cadastrado')
            break;
        case -2:
            toastr.warning('Nenhuma alteração feita')
            break;
        case -1:
            toastr.error('Ocorreu um erro na operação')
            break;
        case 0:
            toastr.warning('Preencher os campos obrigatórios')
            break;
        case 1:
            toastr.success('ação realizada com sucesso')
            break;
    }
}