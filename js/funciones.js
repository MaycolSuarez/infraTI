function deletephp(idProd){
    
    fetch('borrar.php?id='+ idProd, {
        method: 'DELETE'
    })
    .then(res => res.json())
    .then(data => {
        if(data == 'true') {
            location. reload();
        } else {
            console.log(data);
        }
    });

}


function deditarphp(idProd){
    
    id = document.getElementById('id_producto').value;
    producto = document.getElementById('txt_producto').value;
    precio = document.getElementById('int_precio').value;
    tipo =  document.getElementById('txt_tipo').value;

    document.getElementById('tabla1').style.display = 'none';

    document.getElementById('editarform').innerHTML = '<div class="container bg-white rounded shadow mt-4 p-4 col-xl-4 col-lg-6> '+
        '<h2 class="w-100 text-center mb-4">Edicion de producto</h2>' +
        '<hr style="color: #9999;">' +
        
        '<form id="form2">' +

        '<div class="mb-3">'+
            '<input type="number" hidden class="form-control" id="id_producto" name="id_producto" value="'+id+'">'+
        '</div>'+

            '<div class="mb-3">'+
                '<label for="txt_producto" class="form-label">Producto</label>'+
                '<input type="text" class="form-control" id="txt_producto" name="txt_producto" value="'+producto+'"  required="">'+
            '</div>'+

            '<div class="mb-3">'+
                '<label for="int_precio" class="form-label">Valor x Unidad</label>'+
                '<input type="text" class="form-control" id="int_precio" name="int_precio" value="'+precio+'" required="">'+
            '</div>'+

            '<div class="mb-3">'+
                '<label for="txt_tipo" class="form-label">Tipo</label>'+
                '<input type="text" class="form-control" id="txt_tipo" name="txt_tipo" value="'+tipo+'">'+
            '</div>'+

            '<div class="row">'+
                '<div class="col">'+
                    '<button type="button" class="btn btn-danger  text-uppercase fw-bold" onclick="editProd();">Aceptar</button>'+
                '</div>'+
                '<div class="col">'+
                    '<button type="button" class="btn btn-warning  text-uppercase fw-bold" onclick="cancelEdit();">Cancelar</button>'+
                '</div>'+
            '</div>'+

        '</form>'+
        '</div>'
    ;


}

function cancelEdit() {
    document.getElementById('tabla1').style.display = 'block';
    document.getElementById('editarform').style.display = 'none';
}

function editProd() {

        let formulario = new FormData(document.getElementById('form2'));

        fetch('editar.php', {
            method: 'POST',
            body: formulario
        })
        .then(res => res.json())
        .then(data => {
            if(data == 'true') {      
                alert('El producto se edito correctamente.');
                location.reload();
            } else {
                console.log(data);
            }
        });  
}