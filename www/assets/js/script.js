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

function toggledisplay(elementSelector){
    (function(style) {
        style.display = style.display === 'block' ? '' : 'block';
    })(document.querySelector(elementSelector).style);
}

//mostrar formulário de login
let formLogin = document.querySelector(".lgAdmin");
formLogin.addEventListener("click", (event)=>{
    event.preventDefault();
    toggledisplay(".login");
    document.addEventListener("click",(event)=>{
        if(event.target == formLogin){
            formLogin.style.display="none";
        }
    })
});
//Login
function login(btn){
    btn.addEventListener("click", function(event){
        event.preventDefault();
        let email = document.querySelector("#email");
        let senha = document.querySelector("#senha");
        let url = document.URL;
        fetch(url,{
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
                window.location="http://localhost/MinimalBlog/www/adm/index.php"
            }else{
                alert("Usuário não encontrado");
            }
        });
    });
}
let logar= document.querySelector("#logar");
login(logar);