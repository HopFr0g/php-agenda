<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>PHP Basico</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            // Funciones:
            function sumar($a, $b) {
                return $a + $b;
            }
        ?>
        <?php
            // Las variables se expresan con un $ al comienzo:
            $nombre = "Leonel";
            $edad = 22;
            
            // La concatenación de strings se realiza con el operador . (punto):
            print "Mi nombre es: " . $nombre . "<br>";
            
            // Otra opción (solo funciona si se utilizan "comillas dobles"):
            print "Mi nombre es: $nombre<br>";
            
            print 'Mi nombre es: $nombre<br>';
            
            // echo funciona como print pero admite juntar múltiples variables separadas por comas:
            echo $nombre,$edad . "<br>";
            
            // OTRA DIFERENCIA: La función print consume más recursos porque devuelve el valor 1 al terminar.
            
            // Aquí se realiza un llamado a función. Nota - la función puede estar declarada en un bloque php distinto:
            echo "3 + 4 = " . sumar(3, 4) . "<br>";
            
            // Se pueden declarar funciones en otro archivo (biblioteca) e importarlos con include:
            include("00_biblioteca.php");
            
            saludar($nombre);
            
            // require() e include() funcionan de forma similar, pero...
            // SI LA BIBLIOTECA NO EXISTE, REQUIRE INTERRUMPE EL FLUJO DE EJECUCIÓN, MIENTRAS QUE INCLUDE PERMITE QUE CONTINÚE
            
            // Variable local: declarada dentro de una función (solo es visible dentro de la función)
            // Variable global: declarada en cualquier lugar del código PHP (visible desde cualquier lugar)
            // Variable super global: declarada como array (visible desde fuera del script PHP)
            
            // ERROR: Dentro de esta función no puedo acceder a la variable nombre ya que fue declarada fuera del scope de la función:
            function mostrarNombre() {
                echo $nombre;
            }
            mostrarNombre();
            
            // Para acceder, en una función, a una variable de fuera de su scope, uso la palabra reservada "global"
            function imprimirNombre() {
                global $nombre; // global solo puede utilizarse dentro de una función
                echo "El nombre es $nombre<br>";
            }
            imprimirNombre();
            
            // Variables estáticas: permiten conservar el valor de una variable luego que finalizó la función donde fue declarada. Usar la palabra reservada "static"
            function contar() {
                static $contador = 0; // Solo se le asigna el valor 0 la primera vez.
                echo ++$contador . "<br>";
            }
            contar();
            contar();
            contar();
            contar();
            
            // strcpm: función que compara strings (case sensitive)
            // strcasecmp: función que compara strings (not case sensitive)
            // Devuelven 1 (true) si NO son iguales, 0 (false) si son iguales.
            $cadena0 = "Auto";
            $cadena1 = "AUTO";
            echo strcmp($cadena0, $cadena1) . "<br>";
            echo strcasecmp($cadena0, $cadena1) . "<br>";
            
            // Operadores aritmeticos: + - * / % **
            // Operadores de asignación: = += -= *= /= %=
            // Operadores de incremento o decremento: ++preincremento postincremento++ --predecremento postdecremento--
            // Operadores de comparación: < > == === != !== <= >=
            // Operadores lógicos: && || ! xor
            
            // La función define("NOMBRE_CONSTANTE", valor) permite almacenar el valor de una constante:
            // Solo almacenan valores escalares (en una dimensión) (no arrays)
            // Su ámbito de validez es global por defecto
            define("NOMBRE_MASCOTA", "Titina");
            echo NOMBRE_MASCOTA . "<br>";
            
            // Constantes predefinidas de PHP, que cambian según el lugar donde se las está usando:
            // __LINE__, __FILE__, __DIR__, __FUNCTION__ __CLASS__, __TRAIT__, __METHOD__, __NEXTSPACE__
            
            // Número aleatorio:
            echo "El siguiente número es aleatorio entre 20 y 50: " . rand(20, 50) . "<br>";
            
            // Casting:
            // Para convertir un valor a otro tipo de dato, colocar antes del dato, entre paréntesis, el nuevo tipo:
            $numeroString = "5";
            $numeroInt = (int)$numeroString;
            
            echo "$numeroString<br>";
            
            // Cuando se realizan operaciones entre datos de distinto tipo, el cast se realiza de forma implícita (automático):
            echo "5" + 2 . "<br>";
            
            // Ejemplo de condicionales:
            $nota = 78;
            echo "Tu nota es $nota - ";
            if ($nota > 60) {
                echo "¡Eres candidato a promocionar la materia!<br>";
            } elseif ($nota > 40) {
                echo "¡Eres candidato a regularizar la materia!<br>";
            } else {
                echo "Has quedado libre.<br>";
            }
            
            // Operador ternario:
            echo $nota > 60 ? "Has aprobado<br>" : "No has aprobado<br>";
            
            // Estructura switch;
            $fruta = "Kiwi";
            
            switch ($fruta) {
                case "Manzana":
                    echo "Es de color rojo o verde<br>";
                    break;
                case "Mandarina":
                    // Nada - Que continue con el siguiente caso (Naranja) ya que el código es el mismo para ambos.
                case "Naranja":
                    echo "Es de color naranja<br>";
                    break;
                case "Kiwi":
                    echo "Es de color marrón por fuera y verde por dentro<br>";
                    break;
                default:
                    echo "No sé el color. No reconozco esa fruta<br>";
            }
            
            // Bucle while:
            $i = 0;
            while ($i < 5) {
                echo $i++ . "<br>";
            }
            
            // Bucle for:
            for ($i = 0; $i < 5; ++$i) {
                echo $i . "<br>";
            }
            
            // Funciones:
            $a = 5;
            $b = 2;
            
            function sumarDos($a, $b) {
                return "$a + $b = " . $a + $b;
            }
            
            echo sumarDos($a, $b) . "<br>";
            
            function restarDos($a, $b = 0) /* Parámetro por defecto */ {
                return "$a - $b = " . $a - $b;
            }
            
            echo restarDos($a) . "<br>";
            
            function multiplicarDos($a, $b, &$resul) /* Uso el operador & para pasar un parámetro por referencia */ {
                $resul = "$a * $b = " . $a * $b;
            }
            
            $resul = 0;
            
            multiplicarDos($a, $b, $resul);
            
            echo "$resul<br>";
            
            // Array indexado - Primera forma de declararlo: usando el operador [] al final del nombre de la variable
            $frutas[] = "Manzana";
            $frutas[] = "Pera";
            $frutas[] = "Naranja";
            $frutas[] = "Banana";
            $frutas[] = "Kiwi";
            // No es necesario indicar el índice de cada elemento, cuando uso corchetes vacíos [] PHP ordena los elementos automáticamente
            // Luego accedo a cada elemento con su [índice], se empieza a contar desde 0:
            echo $frutas[2] . "<br>";
            
            // También es válido indicar el [índice] del array en el que insertaré un elemento:
            $verduras[0] = "Acelga";
            $verduras[1] = "Espinaca";
            // Puedo saltearme una posición y dejarla sin definir:
            $verduras[3] = "Zapallo";
            // Pero habrá un error si intento acceder a una posición no definida:
            echo $verduras[2] . "<br>";
            
            // Array indexado - Segunda forma de declararlo: usando array(elemento0, elemento1, elemento2, etc)
            $vehiculos = array("Auto", "Moto", "Bicicleta", "Camioneta", "Camión");
            // Se accede a cada elemento con su índice como ya se explicó
            echo $vehiculos[2] . "<br>";
            
            // Array asociativo - Cada posición tiene un "nombre" en lugar de un índice numérico:
            // Se definen con la función array("nombre0"=>"valor0", "nombre1"=>"valor1", etc)
            $alimento = array("nombre"=>"Pizza", "sabor"=>"Salado", "precio"=>50);
            // Acceder a sus elementos:
            echo $alimento["sabor"] . "<br>";
            
            // Comprobar si una variable es una array - Función is_array():
            echo is_array($vehiculos) . "<br>";
            
            // Bucle foreach para recorrer arrays asociativos:
            foreach($alimento as $clave=>$valor) {
                echo "A $clave le corresponde $valor<br>";
            }
            
            // Conocer la cantidad de elementos de un array: count($array)
            // Recorrer array indexado:
            $cantidadElementos = count($frutas);
            for ($i = 0; $i < $cantidadElementos; ++$i) {
                echo $frutas[$i] . "<br>";
            }
            
            // Ordenar elementos de un array: sort($array);
        ?>
    </body>
</html>
