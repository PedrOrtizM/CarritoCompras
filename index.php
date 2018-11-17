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
                        <li><a href="Vista/MiCarrito.php"><span class="glyphicon glyphicon-shopping-cart"></span> Carrito</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
        include "/Logica/conexion.php";


        $result = baseDatos()->query("SELECT * FROM producto");
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="container"> 
                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading" align=center><b><?php echo $row["nombre"]; ?> </b>
                                <br> <?php echo "Precio: $".$row["precio"]; ?></div>
                            <div class="panel-body"><img src="./Imagenes/<?php echo $row["imagen"]; ?>" class="img-responsive" style="width:100%" alt="Image"></div>
                            <center><div class="panel-footer"><?php echo $row["descripcion"] ?></div>
                                
                                <form action="DAOS/AgregarProducto.php" method="post" name="form" >   
                                <label> Cantidad </label>
                                
                                <input type="hidden" name="id" value=<?php echo $row["idproducto"];?>  >
                                <input type="number" name="cantidad" required  min="1" max="10">
                                <input type="submit" value="agregar" class="btn btn-info">
<!--                                    <span class="glyphicon glyphicon-shopping-cart"></span>Agregar-->
                               
                            </form>
                         </center>
                          
                      
                            
                              
                                
                                  
                                
                                         
                        </div>

                    </div>
                <?php } ?>
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
