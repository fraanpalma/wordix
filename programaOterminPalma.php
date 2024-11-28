<?php
include_once("wordix.php");

/** 
 *  > Otermin, Noemí Carolina
 *  > FAI - [4208] 
 *  > Carrera : Tecnicatura en Desarrollo Web 
 *  > E-Mail Institucional : carolina.otermin@est.fi.uncoma.edu.ar 
 *  > GitHub: oterminA
 *    ------------------------------------------------------------
 *  > Palma, Franco Nicolas
 *  > FAI - [5308] 
 *  > Carrera : Tecnicatura en Desarrollo Web 
 *  > E-Mail Institucional : franco.palma@est.fi.uncoma.edu.ar
 *  > GitHub: fraanpalma
 */


/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras() {
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PELON", "LIMON", "SALIR", "VALLE", "BARCO",
        "MUNDO", "OVEJA", "PLAYA", "FRUTA", "BANCO",
        "GALLO", "CAMPO", "LIBRO", "CARTA", "GRANO"
    ];

    return $coleccionPalabras;
}

/**
 * Funcion que carga una estructura indexada de arreglos
 * asociativos. Esta almacena informacion de las partidas que 
 * se jugaron.  
 * @return array 
 */
function cargarPartidas() {
    //array $coleccionPartidas

    $coleccionPartidas = [];
    $coleccionPartidas[0] = ["palabraWordix"=>"MUJER","jugador"=>"majo","intentos"=> 0,"puntaje"=> 0];
    $coleccionPartidas[1] = ["palabraWordix"=>"QUESO","jugador"=>"rudolf","intentos"=> 3,"puntaje"=> 14];
    $coleccionPartidas[2] = ["palabraWordix"=>"FUEGO","jugador"=>"pink2000","intentos"=> 6,"puntaje"=> 10];
    $coleccionPartidas[3] = ["palabraWordix"=>"CASAS","jugador"=>"caro","intentos"=> 2,"puntaje"=> 15];
    $coleccionPartidas[4] = ["palabraWordix"=>"RASGO","jugador"=>"fran","intentos"=> 6,"puntaje"=> 0];
    $coleccionPartidas[5] = ["palabraWordix"=>"GATOS","jugador"=>"gise","intentos"=> 5,"puntaje"=> 11];
    $coleccionPartidas[6] = ["palabraWordix"=>"GOTAS","jugador"=>"amalia","intentos"=> 1,"puntaje"=> 15];
    $coleccionPartidas[7] = ["palabraWordix"=>"HUEVO","jugador"=>"rodri","intentos"=> 3,"puntaje"=> 12];
    $coleccionPartidas[8] = ["palabraWordix"=>"GRANO","jugador"=>"fran","intentos"=> 1,"puntaje"=> 15];
    $coleccionPartidas[9] = ["palabraWordix"=>"SALIR","jugador"=>"caro","intentos"=> 1,"puntaje"=> 16];
    $coleccionPartidas[10] = ["palabraWordix"=>"LIMON","jugador"=>"gise","intentos"=> 4,"puntaje"=> 10];
    $coleccionPartidas[11] = ["palabraWordix"=>"OVEJA","jugador"=>"rodri","intentos"=> 5,"puntaje"=> 10];
    $coleccionPartidas[12] = ["palabraWordix"=>"YUYOS","jugador"=>"amalia","intentos"=> 4,"puntaje"=> 12];
    $coleccionPartidas[13] = ["palabraWordix"=>"SALIR","jugador"=>"jose","intentos"=> 3,"puntaje"=> 14];
    $coleccionPartidas[14] = ["palabraWordix"=>"GOTAS","jugador"=>"luisa","intentos"=> 2,"puntaje"=> 15];
    $coleccionPartidas[15] = ["palabraWordix"=>"FUEGO","jugador"=>"gonzalo","intentos"=> 1,"puntaje"=> 13];
    $coleccionPartidas[16] = ["palabraWordix"=>"VALLE","jugador"=>"anto","intentos"=> 2,"puntaje"=> 14];
    $coleccionPartidas[17] = ["palabraWordix"=>"CARTA","jugador"=>"caro","intentos"=> 3,"puntaje"=> 14];
    $coleccionPartidas[18] = ["palabraWordix"=>"BANCO","jugador"=>"fran","intentos"=> 6,"puntaje"=> 9];
    $coleccionPartidas[19] = ["palabraWordix"=>"NAVES","jugador"=>"cristian","intentos"=> 5,"puntaje"=> 12];
    $coleccionPartidas[20] = ["palabraWordix"=>"QUESO","jugador"=>"luis","intentos"=> 4,"puntaje"=> 11];
    
    return $coleccionPartidas;
}

/**
 * Funcion que permite al usuario elegir una palabra
 * para iniciar su partida. Le solicita al usuario su nombre
 * y un numero de palabra para jugar. Si el numero de palabra 
 * ya fue utilizada por el jugador, el programa le indica
 * que debe elegir otro numero de palabra. Finalizada la partida 
 * los datos se guardan en una estructura de datos de partidas.
 * @param 
 * @return
 */
function jugarPalabraElegida($coleccionPalabras,$nombreUsuario) {
    //int $indice, $opcion
    //string $palabra, $palabraElegida
    //array $partida

// Mostrar las palabras disponibles y pedir al jugador que elija una
echo "Elija una palabra de la siguiente colección de palabras:\n";
foreach ($coleccionPalabras as $indice => $palabra) {
    echo ($indice + 1) . ". $palabra\n";
}

// Solicitar la opción de palabra al usuario
echo "Ingrese el número de la palabra que desea jugar: ";
$opcion = trim(fgets(STDIN)) - 1; // Restamos 1 para coincidir con el índice del arreglo

// Validar que la opción esté dentro del rango
if ($opcion >= 0 && $opcion < count($coleccionPalabras)) {
    $palabraElegida = $coleccionPalabras[$opcion];

    // Llamar a la función de jugar con la palabra elegida
    $partida = jugarWordix($palabraElegida, $nombreUsuario);
    print_r($partida); // Mostrar el resumen de la partida
} else {
    echo "Opción no válida. Intente nuevamente.\n";
    jugarPalabraElegida($coleccionPalabras, $nombreUsuario); // Recursividad para volver a intentar
}

}

/**
 * Funcion que permite al usuario jugar una partida
 * con una palabra aleatoria. Le solicita al usuario su nombre.
 * El programa elegira una palabra aleatoria de las disponibles 
 * para jugar, asegurandose de que no haya sido jugada previamente
 * por el jugador. Finalizada la partida los datos se guardan en 
 * una estructura de datos de partidas.
 * @param array $coleccionPalabras
 * @param string $nombreUsuario
 * @return
 */
function jugarPalabraAleatoria($coleccionPalabras,$nombreUsuario) {
    //string $palabraAleatoria
    //array $partida 

// Seleccionar una palabra aleatoria de la colección
$palabraAleatoria = $coleccionPalabras[array_rand($coleccionPalabras)];
// Llamar a la función de jugar con la palabra aleatoria
$partida = jugarWordix($palabraAleatoria, $nombreUsuario);
print_r($partida); // Mostrar el resumen de la partida

}

/**
 * Funcion que le solicita al usuario un numero de partida y se 
 * muestra en pantalla los datos de la partida. Si el numero de
 * partida no existe, el programa le solicita un numero de partida
 * correcto.
 * @param array $coleccionPartidas
 */
function mostrarUnaPartida($coleccionPartidas) {
    //int $numero, $n, $i
    
    do {    //se valida que el numero no se pase de los límites del arreglo, si se ingresa un numero que se pasa, se vuelve a pedir el número hasta que se escriba uno correcto
        echo "Numero de partida a mostrar:\n";
        $numero = trim(fgets(STDIN));
        $n = count($coleccionPartidas);
    }while ($numero > $n || !(is_numeric($numero)) || $numero <= 0);

    echo "*******************************************\n";
    echo "Partida WORDIX " .  ($numero--) . ": palabra " . $coleccionPartidas[$numero]["palabraWordix"] . "\n";
    echo "Jugador: " . $coleccionPartidas[$numero]["jugador"] . "\n";
    echo "Puntaje: " . $coleccionPartidas[$numero]["puntaje"] . " puntos \n";
    if($coleccionPartidas[$numero]["intentos"] > 0){
        echo "Intento: adivinó la palabra en " . $coleccionPartidas[$numero]["intentos"] . " intentos \n";
    }else{
        echo "Intento: no adivinó la palabra.\n";
    }
    echo "*******************************************\n";
    }


/**
 * Funcion que le solicita al usuario un nombre de jugador y se 
 * muestra en pantalla el primer juego ganado por dicho jugador.
 * En caso que el jugador no haya ganado ninguna partida se 
 * le muestra por pantalla un texto significativo.
 */
function mostrarPrimerPartidaGanadora() {

}

/**
 * Funcion que muestra las estadisticas de un jugador. Se le solicita
 * al usuario que ingrese un nombre de jugador y se muestran las 
 * estadisticas.
 * @param array $coleccionPartidas
 * @param string $nombreJugador
 * @return array
 */
function mostrarResumenJugador($coleccionPartidas,$nombreJugador) {
    // array $resumenJugador, $partida

    // Inicializo el array con el parametro de entrada del jugador y el resto de claves en 0
    $resumenJugador = [
        "jugador" => $nombreJugador,
        "partidas" => 0,
        "puntaje" => 0,
        "victorias" => 0,
        "intento1" => 0,
        "intento2" => 0,
        "intento3" => 0,
        "intento4" => 0,
        "intento5" => 0,
        "intento6" => 0,
    ];

    // Recorrer la colección de partidas
    foreach ($coleccionPartidas as $partida) {
        if ($partida["jugador"] === $nombreJugador) {

            // Incrementar el total de partidas jugadas
            $resumenJugador["partidas"]++;

            // Sumar el puntaje de la partida al puntaje total
            $resumenJugador["puntaje"] += $partida["puntaje"];

            // Si el puntaje es mayor a 0, considerar como victoria
            if ($partida["puntaje"] > 0) {
                $resumenJugador["victorias"]++;
            }

            // Contar el intento correspondiente si fue una victoria
            if ($partida["puntaje"] > 0 && $partida["intentos"] >= 1 && $partida["intentos"] <= 6) {
                $intentoClave = "intento" . $partida["intentos"];
                $resumenJugador[$intentoClave]++;
            }
        }
    }

    return $resumenJugador;

}

/**
 * Funcion que muestra por pantalla la estructura ordenada alfabeticamente
 * por jugador y por palabra, utilizando la funcion predefinida uasort de php
 * y la funcion predefinida print_r .
 * @param array $coleccionPartidas 
 */
function mostrarListadoOrdenado($coleccionPartidas) {
    // string $resultadoComparacion

    // Ordenar la colección usando uasort
    uasort($coleccionPartidas, function ($partida1, $partida2) {
        $resultadoComparacion = strcmp($partida1["jugador"], $partida2["jugador"]);

        // Si los jugadores son iguales, comparar por palabra
        if ($resultadoComparacion === 0) {
            $resultadoComparacion = strcmp($partida1["palabraWordix"], $partida2["palabraWordix"]);
        }

        // Resultado final de la comparación
        return $resultadoComparacion;
    });

    // Mostrar la colección ordenada
    print_r($coleccionPartidas);

}

/**
 * Funcion que le solicita al usuario una palabra de 5 letras y la 
 * agrega en mayusculas a la coleccion de palabras Wordix, para que
 * el usuario pueda utilizarla para jugar.
 * @param array[]
 * @return array[]
 */
function agregarUnaPalabra($coleccionPalabras) {
    //string $palabraNueva
    //int $indiceNuevo

    $palabraNueva = leerPalabra5Letras(); //esta función valida que la palabra tenga 5 letras y la pasa a mayúscula

    while (esPalabraRepetida($coleccionPalabras, $palabraNueva)) { //funcion que vericia que la palabra no este repetida en el arreglo
        echo "Palabra repetida.\n";
        $palabraNueva = leerPalabra5Letras(); // Solicitar una nueva palabra
    } 

    //si la palabra no se repite, entonces se agrega al array
    $indiceNuevo = count($coleccionPalabras);//Se asigna el valor total de elementos del array de coleccion de palabras a esta etiqueta
    $coleccionPalabras[$indiceNuevo] = $palabraNueva;//La nueva palabra se asigna a la colección ya existente en la ultima posición usando la longitud del array
    
    return $coleccionPalabras;
}

/**
 * Función que verifica si una palabra ya está en el arreglo.
 * @param array $coleccionPalabras 
 * @param string $palabraNueva 
 * @return bool 
 */
function esPalabraRepetida($coleccionPalabras, $palabraNueva) {
    $esRepetida = false; // Inicializar la variable bandera como falsa
    $i = 0;

    // Recorrer el arreglo mientras no se encuentre la palabra repetida
    while (!$esRepetida && $i < count($coleccionPalabras)) {
        if ($coleccionPalabras[$i] === $palabraNueva) {
            $esRepetida = true; // Cambiar la bandera si se encuentra la palabra
        }
        $i++; // Avanzar al siguiente elemento
    }

    return $esRepetida;
}

/**
 * *Función que que muestra en pantalla las opciones del menú,
 * le solicita al usuario una opción válida
 * (si la opción no es correcta, se le solicita otra vez un número al usuario hasta que la opción sea
 * válida), y retorna el número de la opción elegida.
 * @return int
 */
function seleccionarOpcion() {
    
    do {
        
        echo ">>>> MENU DE OPCIONES <<<<\n";

        echo "> 1 - Jugar al wordix con una palabra elegida.\n";
        echo "> 2 - Jugar al wordix con una palabra aleatoria.\n";
        echo "> 3 - Mostrar una partida.\n";
        echo "> 4 - Mostrar la primer partida ganadora.\n";
        echo "> 5 - Mostrar resumen de Jugador.\n";
        echo "> 6 - Mostrar listado de partidas ordenadas por jugador y por palabra.\n";
        echo "> 7 - Agregar una palabra de 5 letras a Wordix. \n";
        echo "> 8 - Salir";

        echo "> ELIJA UNA OPCION < \n";

        $opcion = trim(fgets(STDIN));

        if (!is_numeric($opcion) || $opcion < 1 || $opcion > 8) {
            echo "Error: Por favor, ingrese un número entre 1 y 8.\n";
        }

    } while (!is_numeric($opcion) || $opcion < 1 || $opcion > 8);
    
    $opcion = (int)$opcion;

    return $opcion;
}

/**
 * Función que solicita al usuario su nombre para el juego.
 * @return string 
 */
function solicitarNombreJugador() {
    echo "Ingrese su nombre: ";
    $nombreJugador = trim(fgets(STDIN));
    return $nombreJugador;
}

/**
 * Función que solicita al usuario el nombre de un jugador y retorna dicho nombre en minúsculas. 
 * La función verifica que el nombre del jugador comienza con una letra. 
 * @return string
*/
function solicitarJugador(){
    //Boolean $nombreValido
    //String $jugador
    $nombreValido = false; //bandera inicializada en falso para después verificar si el nombre es correcto
    do {
        echo "Ingrese el nombre de un jugador: \n";
        $jugador = trim(fgets(STDIN));
        if ((esPalabra($jugador))){ //si la función esPalabra es TRUE significa que todas las letras del nombre son validas
           $nombreValido = true; //implica que el nombre está verificado 
        }else{
            echo "Nombre inválido, ingrese uno correcto.\n";
            $jugador = trim(fgets(STDIN));
        }
    }while(!$nombreValido); //se repite mientras el nombre no cumpla con los requisitos

    return strtolower($jugador); //una vez que es valido, se lo retorna en minusculas
}


//PROGRAMA PRINCIPAL

//Declaración de variables:


//Inicialización de variables:

//Precargar las estructuras de datos.
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidas();

//Ingresa el nombre de usuario.
$nombreUsuario = solicitarNombreJugador();

//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);

//Menu de opciones.
do {
     $opcion = seleccionarOpcion();
     switch ($opcion) {
        case 1: 
            jugarPalabraElegida($coleccionPalabras);
            break;
        case 2: 
            jugarPalabraAleatoria($coleccionPalabras);
            break;
        case 3: 
            mostrarUnaPartida($coleccionPartidas);
            break;     
        case 4:
            mostrarPrimerPartidaGanadora();
            break;
        case 5:
            mostrarResumenJugador($coleccionPartidas,$nombreJugador);
            break;
        case 6:
            mostrarListadoOrdenado();
            break;
        case 7:
            agregarUnaPalabra($coleccionPalabras);
            break;    
        case 8:
            echo "Saliendo del programa";
            break;
        }
} while ($opcion != 8);

