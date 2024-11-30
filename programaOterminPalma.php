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
 * Función que ordena un array con una función de comparación definida por el usuario y 
 * mantiene la asociación de índices
 * @param array $array 
 * @param callable $callback 
 */
// function uasort(array &$array, callable $callback){}

/**
 * Función que imprime información legible sobre una variable, en caso de recibir un 
 * arreglo los valores son presentados en un formato que
 * muestra las claves y los elementos.
 * @param mixed $value 
 * @param bool $return [optional] 
 * @return string|bool
 */
// function print_r(mixed $value, bool $return = false){}

/**
 * Función que inicializa y retorna una colección de treina palabras
 * @return string[] indexado
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER",
        "QUESO",
        "FUEGO",
        "CASAS",
        "RASGO",
        "GATOS",
        "GOTAS",
        "HUEVO",
        "TINTO",
        "NAVES",
        "VERDE",
        "MELON",
        "YUYOS",
        "PIANO",
        "PISOS",
        "PELON",
        "LIMON",
        "SALIR",
        "VALLE",
        "BARCO",
        "MUNDO",
        "OVEJA",
        "PLAYA",
        "FRUTA",
        "BANCO",
        "GALLO",
        "CAMPO",
        "LIBRO",
        "CARTA",
        "GRANO"
    ];

    return $coleccionPalabras;
}

/**
 * Función que inicializa una estructura de datos con partidas
 * y retorna dicha colección
 * @return array[]
 */
function cargarPartidas()
{
    //Array $coleccionPartidas

    $coleccionPartidas = [];
    $coleccionPartidas[0] = ["palabraWordix" => "MUJER", "jugador" => "majo", "intentos" => 0, "puntaje" => 0];
    $coleccionPartidas[1] = ["palabraWordix" => "QUESO", "jugador" => "rudolf", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[2] = ["palabraWordix" => "FUEGO", "jugador" => "pink2000", "intentos" => 6, "puntaje" => 10];
    $coleccionPartidas[3] = ["palabraWordix" => "CASAS", "jugador" => "caro", "intentos" => 2, "puntaje" => 15];
    $coleccionPartidas[4] = ["palabraWordix" => "RASGO", "jugador" => "fran", "intentos" => 6, "puntaje" => 0];
    $coleccionPartidas[5] = ["palabraWordix" => "GATOS", "jugador" => "gise", "intentos" => 5, "puntaje" => 11];
    $coleccionPartidas[6] = ["palabraWordix" => "GOTAS", "jugador" => "amalia", "intentos" => 1, "puntaje" => 15];
    $coleccionPartidas[7] = ["palabraWordix" => "HUEVO", "jugador" => "rodri", "intentos" => 3, "puntaje" => 12];
    $coleccionPartidas[8] = ["palabraWordix" => "GRANO", "jugador" => "fran", "intentos" => 1, "puntaje" => 15];
    $coleccionPartidas[9] = ["palabraWordix" => "SALIR", "jugador" => "caro", "intentos" => 1, "puntaje" => 16];
    $coleccionPartidas[10] = ["palabraWordix" => "LIMON", "jugador" => "gise", "intentos" => 4, "puntaje" => 10];
    $coleccionPartidas[11] = ["palabraWordix" => "OVEJA", "jugador" => "rodri", "intentos" => 5, "puntaje" => 10];
    $coleccionPartidas[12] = ["palabraWordix" => "YUYOS", "jugador" => "amalia", "intentos" => 4, "puntaje" => 12];
    $coleccionPartidas[13] = ["palabraWordix" => "SALIR", "jugador" => "jose", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[14] = ["palabraWordix" => "GOTAS", "jugador" => "luisa", "intentos" => 2, "puntaje" => 15];
    $coleccionPartidas[15] = ["palabraWordix" => "FUEGO", "jugador" => "gonzalo", "intentos" => 1, "puntaje" => 13];
    $coleccionPartidas[16] = ["palabraWordix" => "VALLE", "jugador" => "anto", "intentos" => 2, "puntaje" => 14];
    $coleccionPartidas[17] = ["palabraWordix" => "CARTA", "jugador" => "caro", "intentos" => 3, "puntaje" => 14];
    $coleccionPartidas[18] = ["palabraWordix" => "BANCO", "jugador" => "fran", "intentos" => 6, "puntaje" => 9];
    $coleccionPartidas[19] = ["palabraWordix" => "NAVES", "jugador" => "cristian", "intentos" => 5, "puntaje" => 12];
    $coleccionPartidas[20] = ["palabraWordix" => "QUESO", "jugador" => "luis", "intentos" => 4, "puntaje" => 11];

    return $coleccionPartidas;
}

/**
 * Funcion que permite al usuario elegir una palabra
 * para iniciar su partida. Le solicita al usuario su nombre
 * y un numero de palabra para jugar. Si el numero de palabra 
 * ya fue utilizada por el jugador, el programa le indica
 * que debe elegir otro numero de palabra. Finalizada la partida,
 * los datos se guardan en una estructura de datos de partidas.
 * @param string[] indexado
 * @param string $nombreUsuario
 * @return array $coleccionPartidas (actualizado)
 */
function jugarPalabraElegida($coleccionPalabras, $nombreUsuario) {
    //Int $indice, $opcion, $cantidad
    //String $palabra, $palabraElegida
    //Array $partida

    $cantidad = count($coleccionPalabras);

    // Muestra las palabras disponibles y pide al jugador que elija una.
    echo "Por favor, elija una palabra de la siguiente colección de palabras: \n";
    foreach ($coleccionPalabras as $indice => $palabra) {
        echo ($indice + 1) . ". $palabra\n";
    }

    // Inicializo las variables.
    $palabraElegida = "";
    $coleccionPartidas = cargarPartidas();

    // Bucle que solicita la palabra mientras cumpla las condiciones.
    do{ 
        // Solicita la opción de palabra al usuario/
        echo "Ingrese el número de la palabra que desea jugar: \n";
        $opcion = trim(fgets(STDIN)) - 1; // Restamos 1 para coincidir con el índice del arreglo

        // Valida que la opción esté dentro del rango
        if ($opcion >= 0 && $opcion < $cantidad) {
            $palabraElegida = $coleccionPalabras[$opcion];
        
            // Verifica que la palabra no haya sido jugada por el jugador.  
            // Inicializo variable bandera.          
            $palabraJugada = false;
            foreach ($coleccionPartidas as $partida) {
                if ($partida["palabraWordix"] === $palabraElegida && $nombreUsuario === $partida["jugador"]) {
                    $palabraJugada = true;
                }      
            }
            // Si la palabra ya fue jugada se le avisa al jugador.
            if ($palabraJugada) {
                echo "Palabra ya jugada! Elija otra para jugar! \n";
                $palabraElegida = ""; // Reinicio la variable.
            }
        } else {
            echo "ERROR: opcion invalida! elija una una palabra dentro de las opciones! \n"; // Mensaje en caso que ingrese una opcion fuera de la coleccion.
        }  
            
    } while ($palabraElegida === ""); 

        //Llama a la función de jugar con la palabra elegida.
        $partida = jugarWordix($palabraElegida, $nombreUsuario);

        // Mostrar el resumen de la partida.
        print_r($partida); 

        // Guardo la partida en la coleccion.
        $coleccionPartidas[] = $partida;

        return $coleccionPartidas;
}


/**
 * Funcion que permite al usuario jugar una partida
 * con una palabra aleatoria. Le solicita al usuario su nombre.
 * El programa elegira una palabra aleatoria de las disponibles 
 * para jugar, asegurandose de que no haya sido jugada previamente
 * por el jugador. Finalizada la partida los datos se guardan en 
 * una estructura de datos de partidas.
 * @param string[] indexado
 * @param string $nombreUsuario
 * @return array $coleccionPartidas (actualizado)
 */
function jugarPalabraAleatoria($coleccionPalabras, $nombreUsuario)
{
    //String $palabraAleatoria
    //Array $partida

    // Inicializo las variables.
    $palabraAleatoria = "";
    $coleccionPartidas = cargarPartidas();

    do {
            // Seleccionar una palabra aleatoria de la colección
            $palabraAleatoria = $coleccionPalabras[array_rand($coleccionPalabras)];

            // Verifica que la palabra no haya sido jugada por el jugador.              
            // Inicializo variable bandera.          
            $palabraJugada = false;
            foreach ($coleccionPartidas as $partida) {
                if ($partida["palabraWordix"] === $palabraAleatoria && $nombreUsuario === $partida["jugador"]) {
                    $palabraJugada = true;
                }      
            }
            // Si la palabra ya fue jugada se le avisa al jugador.
            if ($palabraJugada) {
                $palabraAleatoria = ""; // Reinicio la variable.
            }   

        } while ($palabraAleatoria === "");

        echo "Palabra elegida! A jugar!!!\n";

        // Llamar a la función de jugar con la palabra aleatoria
        $partida = jugarWordix($palabraAleatoria, $nombreUsuario);

        // Mostrar el resumen de la partida
        print_r($partida); 

        // Guardo la partida en la coleccion.
        $coleccionPartidas[] = $partida;

    return $coleccionPartidas;
}

/**
 * Funcion que le solicita al usuario un numero de partida y se 
 * muestra en pantalla los datos de la partida. Si el numero de
 * partida no existe, el programa le solicita un numero de partida
 * correcto.
 * @param array[]
 */
function mostrarUnaPartida($coleccionPartidas)
{
    //Int $numero, $cantidad

    do {    //se valida que el numero no se pase de los límites del arreglo, si se ingresa un numero que se pasa, se vuelve a pedir el número hasta que se escriba uno correcto
        echo "Por favor ingrese el numero de partida a mostrar:\n";
        $numero = trim(fgets(STDIN));
        $cantidad = count($coleccionPartidas);
    } while ($numero > $cantidad || !(is_numeric($numero)) || $numero <= 0);

    echo "*******************************************\n";
    echo "Partida WORDIX " .  ($numero--) . ": palabra " . $coleccionPartidas[$numero]["palabraWordix"] . "\n";
    echo "Jugador: " . $coleccionPartidas[$numero]["jugador"] . "\n";
    echo "Puntaje: " . $coleccionPartidas[$numero]["puntaje"] . " puntos \n";
    if ($coleccionPartidas[$numero]["intentos"] > 0) {
        echo "Intento: adivinó la palabra en " . $coleccionPartidas[$numero]["intentos"] . " intentos \n";
    } else {
        echo "Intento: no adivinó la palabra.\n";
    }
    echo "*******************************************\n";
}


/**
 * Funcion que dada una colección de partidas y el nombre de un jugador, 
 * retorna el índice de la primera partida ganada por dicho jugador, o
 * si el jugador ganó ninguna partida, retorna el valor -1.
 * @param array[]
 * @return int
 */
function mostrarPrimeraPartidaGanadora($coleccionPartidas)
{
    //Boolean $nombreValido, $partidaEncontrada
    //Int $primeraGanada, $i, $j, $cantidad
    $indicePrimeraGanada = -1;
    $j = 0;
    $nombreValido = false;
    $partidaEncontrada = false;
    $cantidad = count($coleccionPartidas);

    //bucle que verifica que el jugador exista dentro del arreglo, no sale hasta que no se ingresa un nombre correcto
    do {
        $nombreJugador = solicitarJugador();
        $i = 0; //el reinicio del contador sirve para que en cada bucle la busqueda empiece otra vez y no comience a buscar desde donde se quedó antes ignorando a los nombres anteriores
        while ($i < $cantidad && !$nombreValido) {
            if ($nombreJugador == $coleccionPartidas[$i]['jugador']) {
                $nombreValido = true;
            }
            $i++;
        }
    } while (!$nombreValido);

    //bucle que busca la primera partida ganada por ese jugador ya verificado
    while ($j < $cantidad && !$partidaEncontrada) {
        if ($coleccionPartidas[$j]['jugador'] == $nombreJugador && $coleccionPartidas[$j]['puntaje'] > 0) {
            $indicePrimeraGanada = $j;
            $partidaEncontrada = true;
        }
        $j++;
    }
    return $indicePrimeraGanada;
}

/**
 * Funcion que muestra las estadisticas de un jugador. Se le solicita
 * al usuario que ingrese un nombre de jugador y se muestran las 
 * estadisticas.
 * @param array[]
 */
function mostrarResumenJugador($coleccionPartidas)
{
    //Array $resumenJugador, $partida
    //String $nombreJugador
    //Int $cantidad, $i
    //Boolean $nombreValido

    $nombreValido = false;
    $cantidad = count($coleccionPartidas);

    echo ">Por favor ingrese el nombre del jugador para ver su resumen: ";

    // bucle que verifica que el jugador exista dentro del arreglo, no sale hasta que no se ingresa un nombre correcto
    do {
        $nombreJugador = solicitarJugador();
        $i = 0; //El reinicio del contador sirve para que en cada bucle la busqueda empiece otra vez y no comience a buscar desde donde se quedó antes, ignorando a los nombres anteriores
        while ($i < $cantidad && !$nombreValido) {
            if ($nombreJugador == $coleccionPartidas[$i]['jugador']) {
                $nombreValido = true;
            }
            $i++;
        }
    } while (!$nombreValido);

    //Inicializa el resumen del jugador, funciona como acumulador
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

    // Recorre la colección de partidas
    foreach ($coleccionPartidas as $partida) {
        if ($partida["jugador"] === $nombreJugador) {
            //Incrementa el total de partidas jugadas
            $resumenJugador["partidas"]++;

            //Suma el puntaje de la partida al puntaje total
            $resumenJugador["puntaje"] += $partida["puntaje"];

            //Si el puntaje es mayor a 0, considera como victoria
            if ($partida["puntaje"] > 0) {
                $resumenJugador["victorias"]++;
            }

            //Cuenta el intento correspondiente si fue una victoria
            if ($partida["puntaje"] > 0 && $partida["intentos"] >= 1 && $partida["intentos"] <= 6) {
                $intentoClave = "intento" . $partida["intentos"];
                $resumenJugador[$intentoClave]++;
            }
        }
    }

    if ($resumenJugador["victorias"] > 0) {
        $porcentajeVictorias = ($resumenJugador["victorias"] / $resumenJugador["partidas"] * 100);
        $porcentajeVictorias = round($porcentajeVictorias, 2);
    } else {
        $porcentajeVictorias = 0; // Si no hay victorias, el porcentaje es 0
    }

    // Muestra el resumen en pantalla
    echo "*****************************************\n";
    echo "Jugador: " . $resumenJugador["jugador"] . "\n";
    echo "Partidas: " . $resumenJugador["partidas"] . "\n";
    echo "Puntaje Total: " . $resumenJugador["puntaje"] . "\n";
    echo "Victorias: " . $resumenJugador["victorias"] . "\n";
    echo "Porcentaje de Victorias: " . $porcentajeVictorias . "%\n";
    echo "Adivinadas:\n";
    for ($i = 1; $i <= 6; $i++) {
        echo "      Intento $i: " . $resumenJugador["intento" . $i] . "\n";
    }
    echo "*****************************************\n";

    // Si el jugador no tiene partidas registradas
    if ($resumenJugador["partidas"] === 0) {
        echo "El jugador " . $nombreJugador . " no tiene partidas registradas.\n";
    }
}

/**
 * Funcion que muestra por pantalla la estructura ordenada alfabeticamente
 * por jugador y por palabra, utilizando la funcion predefinida uasort de php
 * y la funcion predefinida print_r
 * @param array[]
 */
function mostrarListadoOrdenado($coleccionPartidas)
{
    //String $resultadoComparacion

    // Ordena la colección usando uasort
    uasort($coleccionPartidas, function ($partida1, $partida2) {
        $resultadoComparacion = strcmp($partida1["jugador"], $partida2["jugador"]);

        // Si los jugadores son iguales, compara por palabra
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
 * @param string[] indexado
 * @return array[]
 */
function agregarPalabra($coleccionPalabras)
{
    //String $palabraNueva
    //Int $indiceNuevo

    $palabraNueva = leerPalabra5Letras(); //esta función valida que la palabra tenga 5 letras y la pasa a mayúscula

    while (esPalabraRepetida($coleccionPalabras, $palabraNueva)) { //Se verifica que la palabra no este repetida en el arreglo
        echo "ERROR: palabra repetida. Ingrese una palabra nuevamente: ";
        $palabraNueva = leerPalabra5Letras(); // Solicita una nueva palabra en caso de que se repita
    }

    //Si la palabra no se repite, entonces se agrega al arreglo
    $indiceNuevo = count($coleccionPalabras); //Se asigna el valor total de elementos del array de coleccion de palabras a esta etiqueta
    $coleccionPalabras[$indiceNuevo] = $palabraNueva; //La nueva palabra se asigna a la colección ya existente en la ultima posición usando la longitud del array

    return $coleccionPalabras;
}

/**
 * Función que verifica si una palabra ya está en el arreglo.
 * @param string[] indexado
 * @param string $palabraNueva 
 * @return boolean
 */
function esPalabraRepetida($coleccionPalabras, $palabraNueva)
{
    //Boolean $esRepetida
    //Int $i, $cantidad
    $cantidad = count($coleccionPalabras);
    $esRepetida = false; //Inicializa la variable bandera como falsa
    $i = 0;

    // Recorre el arreglo mientras no se encuentre la palabra repetida
    while (!$esRepetida && $i < $cantidad) {
        if ($coleccionPalabras[$i] === $palabraNueva) {
            $esRepetida = true; //Cambia la bandera si se encuentra la palabra
        }
        $i++; //Avanza al siguiente elemento
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
function seleccionarOpcion()
{
    do {
        echo ">>>> MENU DE OPCIONES <<<<\n";

        echo "> 1 - Jugar al wordix con una palabra elegida.\n";
        echo "> 2 - Jugar al wordix con una palabra aleatoria.\n";
        echo "> 3 - Mostrar una partida.\n";
        echo "> 4 - Mostrar la primer partida ganadora.\n";
        echo "> 5 - Mostrar resumen de Jugador.\n";
        echo "> 6 - Mostrar listado de partidas ordenadas por jugador y por palabra.\n";
        echo "> 7 - Agregar una palabra de 5 letras a Wordix. \n";
        echo "> 8 - Salir\n";

        echo "> ELIJA UNA OPCION < \n";

        $opcion = trim(fgets(STDIN));

        if (!is_numeric($opcion) || $opcion < 1 || $opcion > 8) {
            echo "ERROR: por favor, ingrese un número entre 1 y 8.\n";
        }
    } while (!is_numeric($opcion) || $opcion < 1 || $opcion > 8);

    $opcion = (int)$opcion;

    return $opcion;
}

/**
 * Función que usa un modulo para solicitarle el nombre a un jugador 
 * y retorna dicho nombre en minúsculas. 
 * La función verifica que el nombre del jugador comienza con una letra usando ctype_alpha
 * @return string
 */
function solicitarJugador()
{
    //Boolean $esValido
    //String $nombre

    $esValido = false;
    do {
        echo "Por favor ingrese el nombre del jugador: ";
        $nombre = trim(fgets(STDIN));
        if (ctype_alpha($nombre[0])) {
            $esValido = true;
        }
    } while (!$esValido);
    return strtolower($nombre);
}


//PROGRAMA PRINCIPAL

/**
 * Wordix es un juego en el que tendras que adivinar palabras. El desarrollo
 * del juego consiste en resolver una palabra de 5 letras en 6 intentos. Si
 * adivinas una letra y esta se encuentra en el lugar correcto, se pinta de
 * verde. Si adivinas un letra pero esta en el lugar incorrecto, se pinta de
 * amarillo. Si no existe la letra, se pinta de rojo y ya se sabe que no 
 * deberia volver a usarse.
 */

//Declaración de variables:
//Int $opcion, $indiceGanadora
//String $nombreUsuario
//Array $coleccionPalabras, $coleccionPartidas

//Inicialización de variables:

//Precargar las estructuras de datos.
$coleccionPalabras = cargarColeccionPalabras();
$coleccionPartidas = cargarPartidas();

//Ingresa el nombre de usuario.
$nombreUsuario = solicitarJugador();

//Menu de opciones.
do {
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1:
            jugarPalabraElegida($coleccionPalabras, $nombreUsuario);
            break;
        case 2:
            jugarPalabraAleatoria($coleccionPalabras, $nombreUsuario);
            break;
        case 3:
            mostrarUnaPartida($coleccionPartidas);
            break;
        case 4:
            $coleccionPartidas = cargarPartidas();
            $indiceGanadora = mostrarPrimeraPartidaGanadora($coleccionPartidas);
            if ($indiceGanadora == -1) {
                echo "************************************************\n";
                echo "El jugador no ganó ninguna partida.\n";
                echo "************************************************\n";
            } else {
                echo "************************************************\n";
                echo "Partida WORDIX " . ($indiceGanadora + 1) . ": palabra " . $coleccionPartidas[$indiceGanadora]["palabraWordix"] . "\n";
                echo "Jugador: " . $coleccionPartidas[$indiceGanadora]["jugador"] . "\n";
                echo "Puntaje: " . $coleccionPartidas[$indiceGanadora]["puntaje"] . " puntos\n";
                echo "Intento: adivinó la palabra en " . $coleccionPartidas[$indiceGanadora]["intentos"] . " intentos\n";
                echo "************************************************\n";
            }
            break;
        case 5:
            mostrarResumenJugador($coleccionPartidas);
            break;
        case 6:
            mostrarListadoOrdenado($coleccionPartidas);
            break;
        case 7:
            agregarPalabra($coleccionPalabras);
            break;
        case 8:
            echo "Saliste de Wordix.\n";
            break;
    }
} while ($opcion != 8);
