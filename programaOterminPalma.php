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
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "PELON", "LIMON", "SALIR", "VALLE", "BARCO",
        "MUNDO", "OVEJA", "PLAYA", "FRUTA", "BANCO",
        "GALLO", "CAMPO", "LIBRO", "CARTA", "GRANO"
    ];

    return ($coleccionPalabras);
}

/**
 * Funcion que carga una estructura indexada de arreglos
 * asociativos. Esta almacena informacion de las partidas que 
 * se jugaron.  
 * @return array 
 */
function cargarPartidas() {

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
function jugarPalabraElegida($coleccionPalabras) {


}

/**
 * Funcion que permite al usuario jugar una partida
 * con una palabra aleatoria. Le solicita al usuario su nombre.
 * El programa elegira una palabra aleatoria de las disponibles 
 * para jugar, asegurandose de que no haya sido jugada previamente
 * por el jugador. Finalizada la partida los datos se guardan en 
 * una estructura de datos de partidas.
 * @param
 * @return
 */
function jugarPalabraAleatoria() {

}

/**
 * Funcion que le solicita al usuario un numero de partida y se 
 * muestra en pantalla los datos de la partida. Si el numero de
 * partida no existe, el programa le solicita un numero de partida
 * correcto.
 * @param array[]
 */
function mostrarUnaPartida($coleccionPartidas) {
    //Int $numero, $n, $i
    
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
 */
function mostrarResumenJugador() {

}

/**
 * Funcion que muestra por pantalla la estructura ordenada alfabeticamente
 * por jugador y por palabra, utilizando la funcion predefinida uasort de php
 * y la funcion predefinida print_r .
 */
function mostrarListadoOrdenado() {

}

/**
 * Funcion que le solicita al usuario una palabra de 5 letras y la 
 * agrega en mayusculas a la coleccion de palabras Wordix, para que
 * el usuario pueda utilizarla para jugar.
 * @param array[]
 * @return array[]
 */
function agregarUnaPalabra($coleccionPalabras) {
    $palabraNueva = leerPalabra5Letras(); //esta función valida que la palabra tenga 5 letras y la pasa a mayúscula

    while ((in_array($palabraNueva, $coleccionPalabras))){ //se valida que la palabra no esté repetida en el array coleccionPalabras, pidiendo una hasta que sea valida totalmene
        echo "Palabra repetida.\n";
        $palabraNueva = leerPalabra5Letras();
    } 
    //si la palabra no se repite, entonces se agrega al array
    $indiceNuevo = count($coleccionPalabras);//Se asigna el valor total de elementos del array de coleccion de palabras a esta etiqueta
    $coleccionPalabras[$indiceNuevo] = $palabraNueva;//La nueva palabra se asigna a la colección ya existente en la ultima posición usando la longitud del array
    
    return $coleccionPalabras;
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

/* ****COMPLETAR***** */



/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);

/**************************************/
/****** DECLARACION DE FUNCIONES ******/
/**************************************/



/******** MENU DE ELECCION ********/

do {
     $opcion = seleccionarOpcion();
     switch ($opcion) {
        case 1: 
            jugarPalabraElegida($coleccionPalabras);
            break;
        case 2: 
            jugarPalabraAleatoria();
            break;
        case 3: 
            mostrarUnaPartida($coleccionPartidas);
            break;     
        case 4:
            mostrarPrimerPartidaGanadora();
            break;
        case 5:
            mostrarResumenJugador();
            break;
        case 6:
            mostrarListadoOrdenado();
            break;
        case 7:
            agregarUnaPalabra($palabraNueva, $coleccionPalabras);
            break;    
        case 8:
            echo "Saliendo del programa";
            break;
        }
} while ($opcion != 8);

