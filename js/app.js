document.getElementById('form1').addEventListener('submit', function(e) {
    
    e.preventDefault();

    let formulario = new FormData(document.getElementById('form1'));

    fetch('php/insertar.php', {
        method: 'POST',
        body: formulario
    })
    .then(res => res.json())
    .then(data => {
        if(data == 'true') {
            document.getElementById('txt_producto').value = '';
            document.getElementById('int_precio').value = '';
            document.getElementById('txt_tipo').value = '';
            alert('El producto se insertó correctamente.');
            window.location.href = 'php/listar.php';
        } else {
            console.log(data);
        }
    });

});


