function MostrarMensagem(ret) {

    if (ret == -4) {
        toastr.warning('Registro já cadastrado com outra descrição');
    } else if (ret == -3) {
        toastr.warning('Registro já cadastrado');
    } else if (ret == -2) {
        toastr.warning('Nenhuma alteração feita');
    } else if (ret == -1) {
        toastr.error('Ocorreu um erro na operação');
    } else if (ret == 0) {
        toastr.warning('Preencher os campos obrigatórios');
    } else if (ret == 1) {
        toastr.success('Ação realizada com sucesso');
    }

    // switch (ret) {
    //     case -4:
    //         toastr.warning('Registro já cadastrado com outra descrição')
    //         break;
    //     case -3:
    //         toastr.warning('Registro já cadastrado')
    //         break;
    //     case -2:
    //         toastr.warning('Nenhuma alteração feita')
    //         break;
    //     case -1:
    //         toastr.error('Ocorreu um erro na operação')
    //         break;
    //     case 0:
    //         toastr.warning('Preencher os campos obrigatórios')
    //         break;
    //     case 1:
    //         toastr.success('ação realizada com sucesso')
    //         break;
    // }
}