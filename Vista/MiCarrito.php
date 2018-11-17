<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>

        <!--------------------------------------------------------------------------------------------------------------->
        <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!---------------------------------------------------------------------------------------------------------------> 
        <style>
            /* Remove the navbar's default rounded borders and increase the bottom margin */ 
            .navbar {
                margin-bottom: 50px;
                border-radius: 0;
                margin-top: 0px;
            }

            /* Remove the jumbotron's default bottom margin */ 
            .jumbotron {
                margin-bottom: 0;


            }

            /* Add a gray background color and some padding to the footer */
            footer {
                background-color: #f2f2f2;
                padding: 25px;
            }
        </style>

    </head>
    <body>



        <div class="jumbotron">
            <div class="container text-center">
                <h1>RapiDelicias</h1>      
                <p>¡Compra y disfruta!</p>
            </div>
        </div>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">RapiDelicias</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">

                        <li><a href="#">Productos</a></li>

                        <li><a href="#">Contacto</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Mi cuenta</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid text-center">

        </div>



        <div class="panel">
            <div class="panel-heading"><center><h1>TU CARRITO DE COMPRAS</h1></center> </div>
            <div class="panel-body">


                <div class="table-responsive">          
                    <table class="table">

                        <thead>
                            <tr>

                                <th class="danger"><center>Remover</center></th>
                        <th class="success"><center>Cantidad</center></th>


                        <th class="info"><center>Nombre</center></th>
                        <th class="info"> <center>Descripción</center></th>
                        <th class="info"> </th>

                        <th class="info"><center>Precio</center></th>
                        <th class="info"><center>Sub-total</center></th>

                        </tr>
                        </thead>
                        <?php
                        include '../DAOS/DaosProducto.php';

                        $result = baseDatos()->query("SELECT * FROM COMPRA");
                        $total=0;
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tbody>
                              
                            <form action="../DAOS/EliminarCompra.php" method="post" name="form" >                              

                                    <td><center><button type="submit" class="btn btn-danger">x</button></center> </td>
                              <input type="hidden" name="id" value=<?php echo $row["idcompra"];?>  >
                            </form>
                            
                            <td> <center><input type="number" name="cantidad" min="1" max="10" value=<?php echo $row["cantidad"] ?>>
                                <button type="button" class="btn btn-success">Act</button></center>
                            </td>
                            <td><center><?php
                            
                        $producto = obtenerProducto($row["idproducto"]);
                        echo $producto->getNombre();
                            ?></center></td>
                    <td><center><?php echo $producto->getDescripcion();?></center></td>

                            <td><center>Foto</center></td>
                    <td><center><?php echo "$ ".$producto->getPrecio();?></center></td>

                    <td><center><?php echo "$ ".$producto->getPrecio()*$row["cantidad"];
                    $total=$total+($producto->getPrecio()*$row["cantidad"]);
                        ?></center></td>

                            </tr>
                            </tbody>
                           
<?php } ?>
                    </table>
                </div>
                <div ><h2 align=center>TOTAL: <?php echo $total; ?></h2></div>
            </div>
        </div>




        <footer class="container-fluid text-center">
            <p>Online Store Copyright</p>  
            <form class="form-inline">Get deals:
                <input type="email" class="form-control" size="50" placeholder="Email Address">
                <button type="button" class="btn btn-danger">Sign Up</button>
            </form>
        </footer>


        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-latest.js"</script>

    </body>
</html>



