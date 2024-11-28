<?php

/*
La librería JugarWordix posee la definición de constantes y funciones necesarias
para jugar al Wordix.
Puede ser utilizada por cualquier programador para incluir en sus programas.
*/

/**************************************/
/***** DEFINICION DE CONSTANTES *******/
/**************************************/
const CANT_INTENTOS = 6;

/*
    disponible: letra que aún no fue utilizada para adivinar la palabra
    encontrada: letra descubierta en el lugar que corresponde
    pertenece: letra descubierta, pero corresponde a otro lugar
    descartada: letra descartada, no pertence a la palabra
*/
const ESTADO_LETRA_DISPONIBLE = "disponible";
const ESTADO_LETRA_ENCONTRADA = "encontrada";
const ESTADO_LETRA_DESCARTADA = "descartada";
const ESTADO_LETRA_PERTENECE = "pertenece";

/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 *  Solicita al usuario que ingrese un número dentro de un rango específico y
 *  valida que el ingreso sea correcto antes de devolverlo.
 */
function solicitarNumeroEntre($min, $max) {
    //int $numero
    $numero = trim(fgets(STDIN));
    
    if (is_numeric($numero)) { 
        $numero  = $numero * 1; 
    }   

    while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))) { 
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": "; 
        $numero = trim(fgets(STDIN));                                       
        if (is_numeric($numero)) { 
            $numero  = $numero * 1; 
        }
    }
    return $numero;
}

/**
 * Escrbir un texto en color ROJO
 * @param string $texto)
 */
function escribirRojo($texto) {

    echo "\e[1;37;41m $texto \e[0m";
}

/**
 * Escrbir un texto en color VERDE
 * @param string $texto)
 */
function escribirVerde($texto) {

    echo "\e[1;37;42m $texto \e[0m";
}

/**
 * Escrbir un texto en color AMARILLO
 * @param string $texto)
 */
function escribirAmarillo($texto) {

    echo "\e[1;37;43m $texto \e[0m";
}

/**
 * Escrbir un texto en color GRIS
 * @param string $texto)
 */
function escribirGris($texto) {

    echo "\e[1;34;47m $texto \e[0m";
}

/**
 * Escrbir un texto pantalla.
 * @param string $texto)
 */
function escribirNormal($texto) {

    echo "\e[0m $texto \e[0m";
}

/** 
 * función que ajusta el color del texto según el estado, 
 * ayudando a representar visualmente las pistas del juego en la consola.
 * @param string $texto
 * @param string $estado
 */
function escribirSegunEstado($texto, $estado) {

    switch ($estado) {
        case ESTADO_LETRA_DISPONIBLE:
            escribirNormal($texto);
            break;
        case ESTADO_LETRA_ENCONTRADA:
            escribirVerde($texto);
            break;
        case ESTADO_LETRA_PERTENECE:
            escribirAmarillo($texto);
            break;
        case ESTADO_LETRA_DESCARTADA:
            escribirRojo($texto);
            break;
        default:
            echo " $texto ";
            break;
    }
}

/** 
 * la función muestra por pantalla un mensaje de bienvenida a un usuario
 * que ingresa como parametro formal, usando una función para colocar el 
 * texto en amarillo; no retorna nada.
 * @param string $usuario
 */
function escribirMensajeBienvenida($usuario) {

    echo "***************************************************\n"; 
    echo "** Hola ";
    escribirAmarillo($usuario); 
    echo " Juguemos una PARTIDA de WORDIX! **\n";
    echo "***************************************************\n";
}

/**
 * funcion que recibe como parametro una cadena de caracteres y
 * verifica que cada caracter sea una letra.
 */
function esPalabra($cadena) {
    //int $cantCaracteres, $i 
    //boolean $esLetra

    $cantCaracteres = strlen($cadena); 
    $esLetra = true; 
    $i = 0; 

    while ($esLetra && $i < $cantCaracteres) {       
        
        $esLetra =  ctype_alpha($cadena[$i]); 

        $i++; 
    }
    return $esLetra; 
}

/**
 * función que le pide al usuario una palabra de cinco letras y usa una funcion para pasarla a mayusculas,
 *  verificando que la palabra tenga siempre 5 letras, luego la retorna ya en mayusculas;
 *  no hay parámetro formal.
 * @return string
 */
function leerPalabra5Letras() {
    //string $palabra

    echo "Ingrese una palabra de 5 letras: ";
    $palabra = trim(fgets(STDIN)); 
    $palabra  = strtoupper($palabra); 

    while ((strlen($palabra) != 5) || !esPalabra($palabra)) { 

        echo "Debe ingresar una palabra de 5 letras:"; 
        $palabra = strtoupper(trim(fgets(STDIN))); 
    }
    return $palabra;
}


/**
 * Inicia una estructura de datos Teclado de tipo asociativo. 
 * A cada clave se le asigna una letra del alfabeto con el estado 
 * de la letra como "Disponible".
 * @return array
 */
function iniciarTeclado() {
    //array $teclado 

    $teclado = [
        "A" => ESTADO_LETRA_DISPONIBLE, "B" => ESTADO_LETRA_DISPONIBLE, "C" => ESTADO_LETRA_DISPONIBLE, "D" => ESTADO_LETRA_DISPONIBLE, "E" => ESTADO_LETRA_DISPONIBLE,
        "F" => ESTADO_LETRA_DISPONIBLE, "G" => ESTADO_LETRA_DISPONIBLE, "H" => ESTADO_LETRA_DISPONIBLE, "I" => ESTADO_LETRA_DISPONIBLE, "J" => ESTADO_LETRA_DISPONIBLE,
        "K" => ESTADO_LETRA_DISPONIBLE, "L" => ESTADO_LETRA_DISPONIBLE, "M" => ESTADO_LETRA_DISPONIBLE, "N" => ESTADO_LETRA_DISPONIBLE, "Ñ" => ESTADO_LETRA_DISPONIBLE,
        "O" => ESTADO_LETRA_DISPONIBLE, "P" => ESTADO_LETRA_DISPONIBLE, "Q" => ESTADO_LETRA_DISPONIBLE, "R" => ESTADO_LETRA_DISPONIBLE, "S" => ESTADO_LETRA_DISPONIBLE,
        "T" => ESTADO_LETRA_DISPONIBLE, "U" => ESTADO_LETRA_DISPONIBLE, "V" => ESTADO_LETRA_DISPONIBLE, "W" => ESTADO_LETRA_DISPONIBLE, "X" => ESTADO_LETRA_DISPONIBLE,
        "Y" => ESTADO_LETRA_DISPONIBLE, "Z" => ESTADO_LETRA_DISPONIBLE
    ];
    return $teclado;
}

/**
 * Escribe en pantalla el estado del teclado. Acomoda las letras en el orden del teclado QWERTY
 * @param array $teclado
 */
function escribirTeclado($teclado) {
    //array $ordenTeclado (arreglo indexado con el orden en que se debe escribir el teclado en pantalla)
    //string $letra, $estado

    $ordenTeclado = [
        "salto",
        "Q", "W", "E", "R", "T", "Y", "U", "I", "O", "P", "salto",
        "A", "S", "D", "F", "G", "H", "J", "K", "L", "salto",
        "Z", "X", "C", "V", "B", "N", "M", "salto"
    ];

    foreach ($ordenTeclado as $letra) { 
        switch ($letra) {
            case 'salto':
                echo "\n";
                break;
            default:
                $estado = $teclado[$letra]; 
                escribirSegunEstado($letra, $estado); 
                break;
        }
    }
    echo "\n";
};


/**
 * Escribe en pantalla los intentos de Wordix para adivinar la palabra
 * @param array $estruturaIntentosWordix
 */
function imprimirIntentosWordix($estructuraIntentosWordix) {
    //int $cantIntentosRealizados

    $cantIntentosRealizados = count($estructuraIntentosWordix);
    //$cantIntentosFaltantes = CANT_INTENTOS - $cantIntentosRealizados;

    for ($i = 0; $i < $cantIntentosRealizados; $i++) { 
        $estructuraIntento = $estructuraIntentosWordix[$i]; 
        echo "\n" . ($i + 1) . ")  "; 
        foreach ($estructuraIntento as $intentoLetra) { 
            escribirSegunEstado($intentoLetra["letra"], $intentoLetra["estado"]);
        }
        echo "\n";
    }

    for ($i = $cantIntentosRealizados; $i < CANT_INTENTOS; $i++) {
        echo "\n" . ($i + 1) . ")  "; 
        for ($j = 0; $j < 5; $j++) {
            escribirGris(" ");
        }
        echo "\n";
    }
    //echo "\n" . "Le quedan " . $cantIntentosFaltantes . " Intentos para adivinar la palabra!";
}

/**
 * Dada la palabra wordix a adivinar, la estructura para almacenar la información del intento 
 * y la palabra que intenta adivinar la palabra wordix.
 * devuelve la estructura de intentos Wordix modificada con el intento.
 * @param string $palabraWordix //palabra correcta
 * @param array $estruturaIntentosWordix
 * @param string $palabraIntento
 * @return array estructura wordix modificada
 */
function analizarPalabraIntento($palabraWordix, $estruturaIntentosWordix, $palabraIntento) {
    //int $cantCaracteres , $i , $posicion
    //array $estructuraPalabraIntento
    //string $letraIntento , $estado

    $cantCaracteres = strlen($palabraIntento); 
    $estructuraPalabraIntento = []; 
    for ($i = 0; $i < $cantCaracteres; $i++) { 
        $letraIntento = $palabraIntento[$i]; 
        $posicion = strpos($palabraWordix, $letraIntento); 
        if ($posicion === false) { 
            $estado = ESTADO_LETRA_DESCARTADA;
        } else {
            if ($letraIntento == $palabraWordix[$i]) { 
                $estado = ESTADO_LETRA_ENCONTRADA; 
            } else {
                $estado = ESTADO_LETRA_PERTENECE; 
            }
        }
        array_push($estructuraPalabraIntento, ["letra" => $letraIntento, "estado" => $estado]); 
    }

    array_push($estruturaIntentosWordix, $estructuraPalabraIntento);
    return $estruturaIntentosWordix; 
}

/**
 * Actualiza el estado de las letras del teclado. 
 * Teniendo en cuenta que una letra sólo puede pasar:
 * de ESTADO_LETRA_DISPONIBLE a ESTADO_LETRA_ENCONTRADA, 
 * de ESTADO_LETRA_DISPONIBLE a ESTADO_LETRA_DESCARTADA, 
 * de ESTADO_LETRA_DISPONIBLE a ESTADO_LETRA_PERTENECE
 * de ESTADO_LETRA_PERTENECE a ESTADO_LETRA_ENCONTRADA
 * @param array $teclado
 * @param array $estructuraPalabraIntento
 * @return array el teclado modificado con los cambios de estados.
 */
function actualizarTeclado($teclado, $estructuraPalabraIntento) {

    foreach ($estructuraPalabraIntento as $letraIntento) {
        $letra = $letraIntento["letra"];
        $estado = $letraIntento["estado"];
        switch ($teclado[$letra]) {
            case ESTADO_LETRA_DISPONIBLE:
                $teclado[$letra] = $estado;
                break;
            case ESTADO_LETRA_PERTENECE:
                if ($estado == ESTADO_LETRA_ENCONTRADA) {
                    $teclado[$letra] = $estado;
                }
                break;
        }
    }
    return $teclado;
}

/**
 * Determina si se ganó una palabra intento posee todas sus letras "Encontradas".
 * @param array $estructuraPalabraIntento
 * @return bool
 */
function esIntentoGanado($estructuraPalabraIntento) {
    //int $cantLetras , $i
    //bool $ganado

    $cantLetras = count($estructuraPalabraIntento);
    $i = 0;

    while ($i < $cantLetras && $estructuraPalabraIntento[$i]["estado"] == ESTADO_LETRA_ENCONTRADA) {
        $i++;
    }

    if ($i == $cantLetras) {
        $ganado = true;
    } else {
        $ganado = false; 
    }

    return $ganado;
}

/**
 * función que calcula el puntaje de Wordix en base a: la cantidad de intentos y a la clasificación de letras
 * de cada palabra
 * @param string $palabraWordix
 * @param string $nombreUsuario
 * @return int
 */
function obtenerPuntajeWordix($palabraWordix, $nombreUsuario) {
    //Array $arrayPartida estructura multidimensional de arreglos asociativos
    //Int $ptje, $longitudPalabra
    //String $verificarPalabra
    
    $ptje = 0;
    $arrayPartida = jugarWordix($palabraWordix, $nombreUsuario);
    switch ($arrayPartida["intento"]) { 
        case 1:
            $ptje = 6;           
            break;
        case 2:
            $ptje = 5;           
            break;
        case 3:
            $ptje = 4;           
            break;
        case 4:
            $ptje = 3;           
            break;
        case 5:
            $ptje = 2;           
            break;
        case 6:  
            $ptje = 1;           
            break;
        default:
            $ptje = 0;
            break;
    }
    
    $longitudPalabra = strlen($arrayPartida["palabra"]);
    $verificarPalabra = esPalabra($arrayPartida["palabra"]); 

    if ($verificarPalabra && $longitudPalabra == 5){
        for ($i=0; $i < $longitudPalabra; $i++){
            if ($arrayPartida["palabra"] == "A" || $arrayPartida["palabra"] == "E" || $arrayPartida["palabra"] == "I" || $arrayPartida["palabra"] == "O" ||$arrayPartida["palabra"] == "U"){
                $ptje += 1;
            }elseif($arrayPartida["palabra"] < "M"){
                $ptje += 3;
            }else{
                $ptje +=2;
            }
        }
    }else{
        echo "Error. Palabra incorrecta o de longitud no aceptada.\n";
    }
    return $ptje;
}

/**
 * Dada una palabra para adivinar, juega una partida de wordix intentando que el usuario adivine la palabra.
 * @param string $palabraWordix
 * @param string $nombreUsuario
 * @return array estructura con el resumen de la partida, para poder ser utilizada en estadísticas.
 */
function jugarWordix($palabraWordix, $nombreUsuario) {
    //array $arregloDeIntentosWordix, $teclado, $partida
    //int $nroIntento, $indiceIntento, $puntaje
    //string $palabraIntento
    //bool $ganoElIntento

    /*Inicialización*/

    $arregloDeIntentosWordix = []; 
    $teclado = iniciarTeclado(); 
    escribirMensajeBienvenida($nombreUsuario); 
    $nroIntento = 1; 

    
    do {

        echo "Comenzar con el Intento " . $nroIntento . ":\n"; 
        $palabraIntento = leerPalabra5Letras(); 
        $indiceIntento = $nroIntento - 1; 
        $arregloDeIntentosWordix = analizarPalabraIntento($palabraWordix, $arregloDeIntentosWordix, $palabraIntento); 
        
        $teclado = actualizarTeclado($teclado, $arregloDeIntentosWordix[$indiceIntento]); 

        /*Mostrar los resultados del análisis: */

        imprimirIntentosWordix($arregloDeIntentosWordix); 
        escribirTeclado($teclado); 

        /*Determinar si la plabra intento ganó e incrementar la cantidad de intentos */

        $ganoElIntento = esIntentoGanado($arregloDeIntentosWordix[$indiceIntento]); 
        $nroIntento++; 
    } while ($nroIntento <= CANT_INTENTOS && !$ganoElIntento); 

    if ($ganoElIntento) { 
        $nroIntento--; 
        $puntaje = obtenerPuntajeWordix($palabraWordix, $nombreUsuario);//**modificado en base a la función anterior**//
        echo "Adivinó la palabra Wordix en el intento " . $nroIntento . "!: " . $palabraIntento . " Obtuvo $puntaje puntos!";
    } else { 
        $nroIntento = 0; 
        $puntaje = 0; 
        echo "Seguí Jugando Wordix, la próxima será! ";
    }

    $partida = [
        "palabraWordix" => $palabraWordix,
        "jugador" => $nombreUsuario,
        "intentos" => $nroIntento,
        "puntaje" => $puntaje
    ];

    return $partida;
}
