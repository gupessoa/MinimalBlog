var btn = document.querySelector('.mostrarMais');
if(btn){
    let div = document.querySelector('.postContent div');
    function mostrarMais(button, cont){
        let btn =button;
        btn.addEventListener('click', function(event){
            event.preventDefault();
            content = cont;
            if(content.classList.toggle('expandir')){
                btn.innerHTML='Mostrar Menos';
            }else{
                btn.innerHTML='Mostrar Mais';
            }
        });
    }
    mostrarMais(btn, div);
}
// Modal
function modal(div, botao, close){
    // Get the modal
    let modal = div;
  
    // Get the button that opens the modal
    let btn = botao;
  
    // Get the <span> element that closes the modal
    let span = close;
  
    // When the user clicks the button, open the modal 
    btn.addEventListener("click",function(){
        modal.style.display="block";
    });
    // When the user clicks on <span> (x), close the modal
    span.addEventListener("click",function(){
        modal.style.display="none";
    });
    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener("click", function (event) {
        if(event.target == modal){
            modal.style.display="none";
        }
    });
  }

var div = document.querySelector(".modal");
var botao = document.querySelector(".lgAdmin");
var btnClose = document.querySelector(".closeModal");

modal(div, botao, btnClose);

//Login
function login(btn){
    btn.addEventListener("click", function(event){
        event.preventDefault();
        let email = document.querySelector("#email");
        let senha = document.querySelector("#senha");
        fetch("http://localhost/MinimalBlog/www/pages/login.php",{
            method:"POST",
            headers:{"Content-Type":"application/json; charset=utf-8"},
            body: JSON.stringify({
                "email":email.value,
                "senha":senha.value
            })
        })
        .then(response => response.json())
        .then(json =>{
            if(json[0] == "ok"){
                console.log("Usuário Logado com sucesso!!!");
            }else{
                console.log("Usuário Não encontrado!!!");
            }
        });
    });
}
let logar= document.querySelector("#logar");
login(logar);