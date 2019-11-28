function modal(modal, btn, close){
    // Get the modal
    let divModal = modal;
  
    // Get the button that opens the modal
    let botao = btn;
  
    // Get the <span> element that closes the modal
    let span = close;
  
    // When the user clicks the button, open the modal 
    botao.addEventListener('click', (event)=>{
        event.preventDefault();
        divModal.style.display="block";
    });
    // When the user clicks on <span> (x), close the modal
    span.addEventListener("click", ()=>{
        divModal.style.display = "none";
    });
    // When the user clicks anywhere outside of the modal, close it
    document.addEventListener("click", (event)=>{
        if(event.target == modal){
            divModal.style.display = "none";
        }
    });
}
// let logout = document.querySelector(".logout");
// logout.addEventListener("click", ()=>{
//     logout.setAttribute("href", document.URL);
// });
let divModal = document.querySelector(".modal");
let btnDetalhes = document.querySelectorAll(".btnDetalhes");

//pegando os itens e adicionando a chamada de modal especifica para cada um deles
btnDetalhes.forEach(item => {
    item.addEventListener("click", (event)=>{
        event.preventDefault();
        let dadosContato = {
            "assunto":"Teste de Template String com o Objeto fixo",
            "nome":"Gustavo Pessoa",
            "email":"gupessoa@live.com",
            "data":"2018/09/03",
            "msg":"este é o corpo do post contendo todos os elementos",
            "id":"1"
        }
        let dadosPost={
            "id":"1",
            "titulo":"Eu sou Assim",
            "txt":"Esta é a mensagem",
            "hashtags":"#GustavoPessoa, #GustavoPessoa, #GustavoPessoa, #GustavoPessoa",
            "data":"2018-09-03",
            "autor":"Gustavo Pessoa",
        }
        let dadosUser={
            "id":"1",
            "nome":"Alguém",
            "email":"alguem@codnome.com.br",
            "senha":"123",
            "nvlAcesso":"Global System Admnistrator",
            "foto":"Esta é a foto",
            "descPerfil":"um textão não tão grande falando sobre a minha pessoa",
            "dataNasc":"1990-07-19",
        }
        let modalContent = document.querySelector(".modalContent");
        if(item.getAttribute("data-tipo")=="contato"){
            modalContent.innerHTML=`
            <span class="closeModal">&times;</span>
            <h1>${dadosContato.assunto}</h1>
            <h2>${dadosContato.nome}< ${dadosContato.email} ><br><time datetime="${dadosContato.data}">${dadosContato.data}</time></h2>
            <p>${dadosContato.msg}</p>
            <div class="containerBtn">
                <button>Excluir id=${dadosContato.id}</button>
                <button>Responder id=${dadosContato.id}</button>
            </div>
            `;
            let close = document.querySelector(".closeModal");
            modal(divModal, item, close);
        }else if(item.getAttribute("data-tipo")=="post"){
            modalContent.innerHTML=`
            <span class="closeModal">&times;</span>
            <h1>${dadosPost.titulo}</h1>
            <h2>${dadosPost.autor} - <br><time datetime="${dadosPost.data}">${dadosPost.data}</time></h2>
            <p>${dadosPost.txt}</p>
            <div class="containerBtn">
                <button>Excluir id=${dadosPost.id}</button>
                <button>Responder id=${dadosPost.id}</button>
            </div>
            `;
            let close = document.querySelector(".closeModal");
            modal(divModal, item, close);
        }else if(item.getAttribute("data-tipo")=="user"){
            modalContent.innerHTML=`
            <span class="closeModal">&times;</span>
            <h1>${dadosUser.nome}</h1>
            <h2>${dadosUser.email}<br>${dadosUser.nvlAcesso}</h2>
            <p>${dadosUser.foto}</p>
            <p>${dadosUser.dataNasc}</p>
            <p>${dadosUser.descPerfil}</p>
            <div class="containerBtn">
                <button>Excluir id=${dadosUser.id}</button>
                <button>Responder id=${dadosUser.id}</button>
            </div>
            `;
            let close = document.querySelector(".closeModal");
            modal(divModal, item, close);
        }
    });
});
let btnAdd = document.querySelector(".btnAdd");
btnAdd.addEventListener("click", (event)=> {
    event.preventDefault();
    let modalContent = document.querySelector(".modalContent");
    if(btnAdd.getAttribute("data-tipo")=="user"){
    modalContent.innerHTML= `
    <span class="closeModal">&times;</span>
    <div class="cadastro">
        <h2 class="tituloModal">Cadastro Novo Usuário</h2>
        <form class="formCad" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Nome">
            <input type="email" name="email" id="email" placeholder="E-mail">
            <input type="password" name="senha" id="senha" placeholder="Senha">
            <input type="tel" name="tel" id="tel" placeholder="Telefone" pattern="[0-9]{11}">
            <input type="date" name="dataNasc" id="dataNasc" placeholder="Data de Nascimento">
            <input type="text" name="end" id="end" placeholder="Endereço">
            <select name="nvAcesso" id="nvAcesso">
                <option value="0">Global System Admnistrator</option>
                <option value="1">Editors of Site</option>
                <option value="2">Writer and Reviewer</option>
            </select>
            <label for="foto">Foto:<input type="file" name="foto" id="foto" placeholder="Adicione a Foto"></label>
            <textarea name="descPerfil" id="descPerfil" placeholder="Descrição de Perfil"></textarea>
            <input type="submit" class="btn btnCad" value="Cadastrar">
        </form>
    </div>
    `;
    let close = document.querySelector(".closeModal");
    modal(divModal, btnAdd, close);
    let btnCad = document.querySelector(".btnCad");
    btnCad.addEventListener("click", (event)=>{
        event.preventDefault();
        let nome= document.querySelector("#nome").value;
        let email= document.querySelector("#email").value;
        let senha= document.querySelector("#senha").value;
        let tel= document.querySelector("#tel").value;
        let dataNasc= document.querySelector("#dataNasc").value;
        let end= document.querySelector("#end").value;
        let nvAcesso= document.querySelector("#nvAcesso").value;
        let foto = document.querySelector("#foto").value;
        let descPerfil = document.querySelector("#descPerfil").value;

        let infoUser = {
            "nome" : nome,
            "email" : email,
            "senha" : senha,
            "tel" : tel,
            "dataNasc" : dataNasc,
            "end" : end,
            "nvAcesso" : nvAcesso,
            "foto" : foto,
            "descPerfil" : descPerfil
        };
        let url = document.URL;
        fetch(url, {
            method:"POST",
            headers:{"Content-Type":"application/json; charset=utf-8"},
            body: JSON.stringify(infoUser),
            credentials: "include"
        })
            .then(response => response.json())
            .then(response=>{
                if(response.status=="ok"){
                    console.log("cadastrado com sucesso");
                    divModal.style.display = "none";
                }else{
                    console.log('erro');
                };
            });
    });
    }else
    if(btnAdd.getAttribute("data-tipo")=="post"){
        modalContent.innerHTML= `
        <span class="closeModal">&times;</span>
        <div class="cadastro">
            <h2 class="tituloModal">Novo Post</h2>
            <form class="formCad" method="POST">
                <input type="text" name="titulo" id="titulo" placeholder="Titulo">
                <input type="date" name="data" id="data" disabled placeholder="<?php date('d/m/Y'); ?>">
                <textarea name="txt" id="txt" cols="30" rows="10" placeholder="Digite seu Post"></textarea>
                <input type="text" name="hashtags" id="hashtags" placeholder="HashTags">
                <input type="submit" class="btn btnCad" value="Postar">
            </form>
        </div>
        `;
        let close = document.querySelector(".closeModal");
        modal(divModal, btnAdd, close);
        let btnCad = document.querySelector(".btnCad");
        btnCad.addEventListener("click", (event)=>{
            event.preventDefault();
            let infoPost = {
                "titulo" : document.querySelector("#titulo").value,
                "data" : document.querySelector("#data").value,
                "txt" : document.querySelector("#txt").value,
                "hashtags" : document.querySelector("#hashtags").value
            };
            let url = document.URL;
            fetch(url, {
                method:"POST",
                headers:{"Content-Type":"application/json; charset=utf-8"},
                body: JSON.stringify(infoPost),
                credentials: "include"
            })
                .then(response => response.json())
                .then(response=>{
                    if(response.status=="ok"){
                        console.log("Postado com sucesso");
                        divModal.style.display = "none";
                    }else{
                        console.log('erro');
                    };
                });
        });
    }
});
