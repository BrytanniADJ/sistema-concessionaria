const detelarUser = (id) => {
    const result = confirm(`Deseja mesmo exluir o usuário de id: ${id}`)

    if(result){
        // redirecionar para ./lib/valida.php?deletar=users&id=
        window.location.assign(`../lib/valida.php?deletar=users&id=${id}`);
    }
    return
}

const editarUser = (id) => {
    const result = confirm(`Deseja mesmo editar o usuário de id: ${id}`)

    if(result){
        // redirecionar para ./editUser.php?id=id
        window.location.assign(`../users/edita.php?id=${id}`);
    }
    return
}
