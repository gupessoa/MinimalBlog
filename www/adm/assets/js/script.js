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
let divModal = document.querySelector(".modal");
let btnDetalhes = document.querySelectorAll(".btnDetalhes");
let close = document.querySelector(".closeModal");
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
        let modalContent = document.querySelector(".detalhes");
        if(item.getAttribute("data-tipo")=="contato"){
            modalContent.innerHTML=`
            <h1>${dadosContato.assunto}</h1>
            <h2>${dadosContato.nome}< ${dadosContato.email} ><br><time datetime="${dadosContato.data}">${dadosContato.data}</time></h2>
            <p>${dadosContato.msg}</p>
            <div class="containerBtn">
                <button>Excluir id=${dadosContato.id}</button>
                <button>Responder id=${dadosContato.id}</button>
            </div>
            `;
            modal(divModal, item, close);
        }else{
            // if(item.getAttribute("data-tipo")=="post")
            modalContent.innerHTML=`
            <h1>${dadosPost.titulo}</h1>
            <h2>${dadosPost.autor} - <br><time datetime="${dadosPost.data}">${dadosPost.data}</time></h2>
            <p>${dadosPost.txt}</p>
            <div class="containerBtn">
                <button>Excluir id=${dadosPost.id}</button>
                <button>Responder id=${dadosPost.id}</button>
            </div>
            `;
            modal(divModal, item, close);
        }
        
    });
});