document.addEventListener('keypress', (e) => {

    if (e.key === 'Enter') {

        e.preventDefault();

        if (e.target.id == 'tipo') {
            // botão chama CadastrarTipoEquipamentoAJAX('formTipo')
            $("#btn_cadastrar").click();
        } else if (e.target.getAttribute('id') == 'tipo_alterar') {
            // botão chama AlterarTipoEquipamentoAJAX('formAlt')
            $("#btn_alterar").click();
        }
    }
});