<?php
    include("conexion.php");
    if(isset($_POST['btnRegistro'])){    
        if (strlen($_POST ['name'])>=1 && strlen($_POST ['email'])>=1 && strlen($_POST ['contraseña'])>=1){
            $name = $_POST ['name'];
            $email = $_POST ['email']; 
            $password = $_POST ['contraseña'];

            function cifrarSha1($msjCifrar){
                $pswCifradaSha1 = sha1($msjCifrar);
                return $pswCifradaSha1;
            }
            function cifrarMD5($msjCifrar){
                $pswCifradaMD5 = md5($msjCifrar);
                return $pswCifradaMD5;
            }
            echo "Mensaje a cifrar es: " . $password .  "<br/><br/>";

            $mensajeCifradoSHA1 = cifrarSha1($password);
            echo "Mensaje Cifrado con SHA1: " . $mensajeCifradoSHA1 . "<br/><br/>";

            $mensajeCifradoMD5 = cifrarMD5($password);
            echo "Mensaje Cifrado con MD5: " . $mensajeCifradoMD5 . "<br/><br/>";
            
            $query = "INSERT INTO datosU(nombre, email, psw, pswCifSHA1,pswCifMD5) VALUES ('$name','$email','$password','$mensajeCifradoSHA1','$mensajeCifradoMD5')";
            $resultadoC = mysqli_query($conexion,$query);
            if($resultadoC){
                ?> <h3 class="ok"> RegistroCorrecto </h3> <?php
            }else{
                ?> <h3 class="bad"> Incorrecto </h3> <?php
            }
        }else{
            
            ?><h3 class="bad"> Completa los campos</h3><?php
        }
    }
?> 