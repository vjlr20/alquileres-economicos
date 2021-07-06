document.getElementById("estado").addEventListener('change', () => {
  let selected = document.getElementById("estado").value;
  let estado = document.getElementById("mostrar");
  if(selected === "abono"){
    estado.innerHTML = "<input type='number' name='abono' class='form-control' placeholder='ingrese el abono' min='0' step='0.01' required>";
  }else{
    estado.innerHTML = "";
  }

});
