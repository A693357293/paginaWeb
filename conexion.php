<?php 

$nombre = $_POST['nombre'];
$pass = $_POST['password'];

$con = mysqli_connect("basedatos:3306","root","miguel","usuarios");
$query = "select * from clientes where username='".$nombre."' and contra='".$pass."'";

if($con){
    $result = mysqli_query($con, $query);

    if ($result->num_rows > 0) {
        // output data of each row
     
        while($row = $result->fetch_assoc()) {
            $nombre = $row['nombre'];
            $username = $row['username'];
            $password = $row['contra'];
            $correo = $row['correo'];

            echo '<!DOCTYPE html>
            <html lang="es">
            
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=1, initial-scale=1.0">
                    <title>LoyoSteve Inc. | Sesion</title>
                    <link rel="stylesheet" href="estilosesion.css">
                    <link rel="shortcut icon" href="undraw_male_avatar_323b.svg" type="image/x-icon">
                </head>
            
                <body>
                    <header>
                        <img class="imagenh" src="data_maintenance_isometric.svg"> 
                        <div class="contentheader">
             	    	                     
                            <dir></dir>
                       
                            <nav class="navbar">
                                <ul> 
                                
                                    <li><a href="index.html">Inicio</a></li>
                                    <li><a href="#">Servicio</a></li>
                                    <li><a href="#">Porfolio</a></li>
                                 

                                </ul>
                            </nav>
                        </div>

                    </header>
                   
                   
            
                    <div class="formulario">
                       
                        <form action="">
                        
                            <div class="user">
                                <img class="imagenIcono" src="undraw_male_avatar_323b.svg">
                                <h1>Nombre:'.$nombre.'</h1><br>
                            </div>
                            <div class="infouser">
                                <h2>Contraseña:'.$password.'</h2><br>
                                <h2>Correo:'.$correo.'</h2><br>
                                <h2>UserName:'.$username.'</h2><br>
                            </div>
                        </form>
                    </div>
            
                    <footer>
                        <div class="conteninfo">
                             <h1>Alfonso Company Inc.</h1>
                             <p>Página diseñada por Alfonso Company Inc. | Todos los derechos reservados</p>
            
                        </div>
                    </footer>
                </body>
            
          

            </html>';

        }
    }else {
        echo'<script type="text/javascript">
        alert("Usuario o contraseña incorrectos");
        window.location.href="index.html";
        </script>';
    }

  mysqli_close($con);
}else{
    echo "no conectado bro..";
}

?>