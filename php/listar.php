<?php
    //"mysql:host=50.18.232.33;port=3306;dbname=infrati", "may1", "Ma.12345"
    $con = mysqli_connect('50.18.232.33',"may2", "Ma.12345",'infrati')

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="../Boostrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <!--Navbnar-->
    <div class="col-12" onload(listar;)>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../Images/Uniminutio.png" alt="Uniminutio" width="50px">
                </a>
                <!--boton-->
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"> <a href="../index.html" class="nav-link">Registrar Productos</a> </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item"> <a href="listar.php" class="nav-link">Listar Productos</a> </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--Tabla-->
    <div class="container bg-white rounded shadow mt-4 p-4 col-xl-10 col-lg-10 ">

        <div id="editarform" >

        </div>

        <table id="tabla1" class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Precio</th>
                <th scope="col">Tipo</th>
                </tr>
            </thead>
            <?php
                $sql = 'SELECT * FROM productos';
                $result = mysqli_query($con,$sql);

                while ($mostar=mysqli_fetch_array($result)) {  
            ?>
            <tbody>
                <tr>
                    <th scope="row">
                        <div>
                            <input  id="id_producto" type="number" readonly hidden VALUE="<?php echo $mostar['id']?>">
                        </div>
                    </th>
                    <td> 
                        <div>
                            <input  id="txt_producto" type="text" readonly hidden VALUE="<?php echo $mostar['producto']?>">
                        </div>
                        <?php echo $mostar['producto']?>
                    </td>
                    <td> 
                        <div>
                            <input  id="int_precio" type="int" readonly hidden VALUE="<?php echo $mostar['precio']?>">
                        </div>
                        <?php echo $mostar['precio']?>
                    </td>
                    <td> 
                        <div>
                            <input  id="txt_tipo" type="text" readonly  hidden VALUE="<?php echo $mostar['tipo']?>">
                        </div>
                        <?php echo $mostar['tipo']?> 
                    </td>
                    <td>
                        <div class="btn btn-primary" onclick="deletephp(<?php echo $mostar['id']?>);">ELIMINAR</div>
                    </td>
                    <td>
                        <div class="btn btn-warning" onclick="deditarphp(<?php echo $mostar['id']?>);">EDITAR</div>
                    </td>
                </tr>
            </tbody>
            <?php
                }
            ?>
        </table>
    </div>
    <script src="../Boostrap/js/bootstrap.min.js"></script>
    <script src="../js/funciones.js"></script>
</body>
</html>
