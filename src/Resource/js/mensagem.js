function MostrarMensagem(ret) {

    if (ret == -19231) {
        // número aleatório apenas para facilitar a inclusão de novos números abaixo
    } else if (ret == -9) {
        toastr.error('E-mail já cadastrado');
    } else if (ret == -8) {
        toastr.warning('E-mail inválido');
    } else if (ret == -7) {
        toastr.error('CPF inválido');
    } else if (ret == -6) {
        toastr.warning('Formato de CEP inválido');
    } else if (ret == -5) {
        toastr.warning('CEP não encontrado');
    } else if (ret == -4) {
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