const detelarUser = (id) => {
    const result = confirm(`Deseja mesmo exluir o usuário de id: ${id}`)

    if(result){
        window.location.assign(`../lib/valida.php?deletar=users&id=${id}`);
    }
    return
}
const editarUser = (id) => {
    const result = confirm(`Deseja mesmo editar o usuário de id: ${id}`)

    if(result){
        window.location.assign(`../users/edita.php?id=${id}`);
    }
    return
}
const addMenu = (menu) =>{
    const listaMenu = ['users', 'marcas'];
    for (let i = 0; i < listaMenu.length; i++){
        if(listaMenu[i] === menu){
            listaMenu.splice(i,1);
        }
    }
    const elemento = document.querySelector(`#menu_${menu}`)
    const bt = document.querySelector(`#bt_menu_${menu}`)
    elemento.style.display = 'block';
    bt.style.display = 'none';

    for (let i = 0; i < listaMenu.length; i++){
        let nome = listaMenu[i];
        let element = document.querySelector(`#menu_${nome}`)
        const button = document.querySelector(`#bt_menu_${nome}`)
        element.style.display = 'none';
        button.style.display = 'block';
    }
}
const deletar = (tabela,id) => {
    const result = confirm(`Deseja mesmo exluir ${tabela} de id: ${id}`)

    if(result){
        window.location.assign(`../lib/valida.php?deletar=${tabela}&id=${id}`);
    }
    return
}
const editar = (tabela, id) => {
    const result = confirm(`Deseja mesmo editar ${tabela} de id: ${id}`)

    if(result){
        window.location.assign(`../${tabela}/edita.php?id=${id}`);
    }
    return
}
