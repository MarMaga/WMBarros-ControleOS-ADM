document.addEventListener('keypress', (e) => {

    if (e.key === 'Enter') {

        e.preventDefault();
        
        if (e.target.id == 'setor') {
            // botão chama CadastrarSetorAJAX('formTipo')
            $("#btn_cadastrar").click();
        } else if (e.target.getAttribute('id') == 'setor_alterar') {
            // botão chama AlterarSetorAJAX('formAlt')
            $("#btn_alterar").click();
        }
    }
});