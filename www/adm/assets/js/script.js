function modal(modal, btn, close){
    // Get the modal
    var modal = modal;
  
    // Get the button that opens the modal
    var btn = btn;
  
    // Get the <span> element that closes the modal
    var span = close[0];
  
    // When the user clicks the button, open the modal 
    // btn.onclick = function() {
    //   modal.style.display = "block";
    // }
    btn.addEventListener('click', (event)=>{
        event.preventDefault();
        modal.style.display="block";
    });
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    span.addEventListener("click", ()=>{
        modal.style.display = "none";
    });
  
    // When the user clicks anywhere outside of the modal, close it
    document.addEventListener("click", (event)=>{
        if(event.target == modal){
            modal.style.display = "none";
        }
    });
}