<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form action="" method="post">
            Name: <input type="text" name="name"><br>
            E-mail: <input type="text" name="email"><br>
            <input type="submit" name="submit" id="submit">
        </form>
        
        <?php
            // $_POST es una variable super-global. Es un array asociativo que contiene las variables pasadas mediante una peticion POST.
            
            // isset() es una función de PHP que detecta si una variable está definida y no es null.
            
            // En este caso se utiliza isset() para verificar si el input de submit tiene un valor (porque se le ha hecho click)
            
            if (isset($_POST["submit"])) {
                echo "Your name: " . $_POST["name"] . "<br>";
                echo "Your email: " . $_POST["email"] . "<br>"; 
            } 
        ?>
    </body>
</html>