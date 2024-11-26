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
 * @param array $partida
 * @return array 
 */

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
 */
function mostrarUnaPartida() {

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
 */
function agregarUnaPalabra($palabraNueva, $coleccionPalabras) {
    $palabraNueva = strtoupper($palabraNueva);
    //Se asigna el valor total de elementos del array de coleccion de palabras a esta etiqueta
    $indiceNuevo = count($coleccionPalabras);
    
    //La nueva palabra se asigna a la colección ya existente en la ultima posición usando la longitud del array
    $coleccionPalabras[$indiceNuevo] = $palabraNueva;
        
    return $coleccionPalabras;
    }

/**
 * *Función que que muestra en pantalla las opciones del menú,
 * le solicita al usuario una opción válida
 * (si la opción no es correcta, se le solicita otra vez un número al usuario hasta que la opción sea
 * válida), y retorna el número de la opción elegida.
 * @param int $opcion
 * @return int
 */
function menu($opcion) {
    while ($opcion < 1 && $opcion > 8){
        echo "Ingrese una opción válida:\n";
        $opcion = trim(fgets(STDIN));
    }
        echo ">Seleccione una opción:\n";
        echo "1. Jugar al wordix con una palabra elegida.\n";
        echo "2. Jugar al wordix con una palabra aleatoria.\n";
        echo "3. Mostrar una partida.\n";
        echo "4. Mostrar la primer partida ganadora.\n";
        echo "5. Mostrar resumen de Jugador.\n";
        echo "6. Mostrar listado de partidas ordenadas por jugador y por palabra.\n";
        echo "7. Agregar una palabra de 5 letras a Wordix. \n";
        echo "8. Salir";
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
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case 1: 
            jugarPalabraElegida();
            break;
        case 2: 
            jugarPalabraAleatoria();
            break;
        case 3: 
            mostrarUnaPartida();
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
        default:
            echo "> Ingrese una opcion valida para continuar.\n";
            break;
    }
} while ($opcion != 8);

