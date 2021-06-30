const form = document.getElementById("login-form");

const removeSpaces = (string) => {
    let newString = string.replace(/\s/g, '');
    
    return newString;
}

form.addEventListener('submit', (e) => {
    e.preventDefault();

    let data = new FormData(form);

    if (removeSpaces(data.get("username")).length == 0 || removeSpaces(data.get("password")).length == 0) {
        Swal.fire(
            'Error al iniciar sesión!',
            'Asegurate de ingresar tu credenciales correctamente',
            'error'
        );
    } else {
        fetch('../../core/auth.php')
        .then(res => res.json())
        .then(data => {
            console.log(data);
        })

    }
});
