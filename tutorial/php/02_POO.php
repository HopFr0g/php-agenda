<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>PHP POO</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            // El concepto de POO es el mismo que en los demás lenguajes orientados a objetos. Van unos ejemplo:
            
            // Clase padre (abstracta, sí o sí se debe instanciar una de sus clases hijas, es polimorfismo):
            abstract class Usuario {
                protected $nombre;
                protected $edad;
                
                // constructor:
                public function __construct($nombre, $edad) {
                    $this->nombre = $nombre;
                    $this->edad = $edad;
                }
                
                // A pesar de ser una clase abstracta, se puede acceder a este método:
                public function toString() {
                    return "Usuario: $this->nombre ($this->edad años).";
                }
                
                // Este método, en cambio, es abstracto. No está definido y las hijas están obligadas a sobrescribirlo:
                abstract public function describir();
            }
            
            // Clase hija:
            class Estudiante extends Usuario {
                private $carrera;
                
                // Atributo estático, pertenece a la clase. Tendrá el mismo valor para cada instancia de esta clase:
                static private $beca = 1500;
                
                public function __construct($nombre, $edad, $carrera) {
                    // llamar al constructor del padre:
                    parent::__construct($nombre, $edad);
                    $this->carrera = $carrera;
                }
                
                public function toString() {
                    // se accede a los atributos del padre como si fueran de esta misma clase, solo asegurarse que sean "protected":
                    return "Usuario: $this->nombre ($this->edad años). Pertenece a la carrera: $this->carrera.";
                }
                
                public function describir() {
                    echo "Soy un Estudiante<br>";
                }
                
                public function mostrarBeca() {
                    // Para acceder a un atributo estático (pertenece a la clase en lugar de a este objeto) se usa self:: en vez de this->
                    echo "$" . self::$beca . "<br>";
                }
                
                // Método estático, no puede ser accedido con nombreObjeto->método() sino que se accede con NomreClase::método()
                static public function definirBeca($montoBeca) {
                    self::$beca = $montoBeca;
                }
            }
            
            // Clase hija 2:
            class Docente extends Usuario {
                private $catedra;
                
                public function __construct($nombre, $edad, $catedra) {
                    parent::__construct($nombre, $edad);
                    $this->catedra = $catedra;
                }
                
                public function toString() {
                    // se accede a los métodos de la clase padre con parent::metodo()
                    return parent::toString() . " Dicta la cátedra: $this->catedra.";
                }
                
                public function describir() {
                    echo "Soy un Docente.<br>";
                }
            }
            
            $lulu = new Docente("Lulu", 15, "Cálculo Numérico");
            $leonel = new Estudiante("Leonel", 22, "Informática");
            
            echo $lulu->toString() . "<br>";
            echo $leonel->toString() . "<br>";
            
            $lulu->describir();
            $leonel->describir();
            
            // Acceder a un método estático (pertenece a la clase en lugar de pertencer a cada instancia):
            Estudiante::definirBeca(2000);
            
            $leonel->mostrarBeca();
        ?>
    </body>
</html>