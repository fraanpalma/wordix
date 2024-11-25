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

    $numero = trim(fgets(STDIN)); //el usuario ingresa un numero.

    if (is_numeric($numero)) { //determina si un string es un número. puede ser float como entero.
        $numero  = $numero * 1; //con esta operación convierto el string en número.
    }
    //estr. repetitiva while que asegura que sea un numero , sea un numero entero y este dentro de un rango especifico.
    while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))) { 
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": "; //si no ingresa un numero valido se le pide al usuario 
        $numero = trim(fgets(STDIN));                                       //que ingrese nuevamente un numero dentro del rango.
        if (is_numeric($numero)) { //determina si un string es un número. puede ser float como entero.
            $numero  = $numero * 1; //con esta operación convierto el string en número.
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

    echo "***************************************************\n"; //decorativo
    echo "** Hola ";
    escribirAmarillo($usuario); //invocacion de la funcion para escribir el usuario en amarillo
    echo " Juguemos una PARTIDA de WORDIX! **\n";
    echo "***************************************************\n"; //decorativo
}


/**
 * funcion que recibe como parametro una cadena de caracteres y
 * verifica que cada caracter sea una letra.
 */
function esPalabra($cadena) {

    //int $cantCaracteres, $i 
    //boolean $esLetra

    $cantCaracteres = strlen($cadena); //cuenta la cantidad de letras de la cadena de caract.
    $esLetra = true; //variable tipo bandera inicializada en verdadero que representa a una letra.
    $i = 0; //variable para recorrer las posiciones de la cadena de caract.

    while ($esLetra && $i < $cantCaracteres) { /** Condic. de la estr. repetit. mientras sea una letra
                                                * y la var. iteradora sea menor a la cantidad de 
                                                * caracteres se mantiene el bucle. */       
        
        $esLetra =  ctype_alpha($cadena[$i]); /** verifica que cada carater del parametro sea una letra 
                                               * del alfabeto recorriendo cada posicion en cada ciclo iterativo.
                                               * Devuelve false si no es una letra. */

        $i++; //aumenta en 1 la variable , cambia la posicion.
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
    $palabra = trim(fgets(STDIN)); //lee la palabra de 5 letras que ingresa el usuario.
    $palabra  = strtoupper($palabra); //cambia todas las letras de la palabra a MAYUSC. con la funcion strtoupper

    while ((strlen($palabra) != 5) || !esPalabra($palabra)) { /**estruct. repetit. que verifica si la palabra
                                                               * ingresada sea una palabra, y que esa palabra
                                                               *  tenga 5 letras. */

        echo "Debe ingresar una palabra de 5 letras:"; //vuleve a solicitar que ingrese una palabra
        $palabra = strtoupper(trim(fgets(STDIN))); //vuelve a cambiar las letras a MAYUSC.
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

    foreach ($ordenTeclado as $letra) { /** recorrido del teclado que realiza un salto de linea en el elemento "salto"
                                          * y en el resto de los elementos pone cada letra con su estado. */
        switch ($letra) {
            case 'salto':
                echo "\n";
                break;
            default:
                $estado = $teclado[$letra]; //le asigna a la varialbe el estado de la letra recorriendo el teclado.
                escribirSegunEstado($letra, $estado); //invoca la funcion que escribe por pantalla la letra del color que corresponde a cada estado.
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

    for ($i = 0; $i < $cantIntentosRealizados; $i++) { //recorre cada intento realizado
        $estructuraIntento = $estructuraIntentosWordix[$i]; //obtiene el intento con su letra y estado
        echo "\n" . ($i + 1) . ")  "; //imprime el nro de intento
        foreach ($estructuraIntento as $intentoLetra) { //recorre cada letra del intento y su estado
            escribirSegunEstado($intentoLetra["letra"], $intentoLetra["estado"]); //escribe en pantalla la letra y su estado
        }
        echo "\n";
    }

    for ($i = $cantIntentosRealizados; $i < CANT_INTENTOS; $i++) { //recorrido de los intentos que todavia no se han realizado
        echo "\n" . ($i + 1) . ")  "; //imprime el nro de intento
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

    $cantCaracteres = strlen($palabraIntento); //cuenta la cantidad de caract de la palabra del juego.
    $estructuraPalabraIntento = []; //almacena cada letra de la palabra intento con su estado.

    for ($i = 0; $i < $cantCaracteres; $i++) { //recorrido de cada letra 
        $letraIntento = $palabraIntento[$i]; //letra en cada posicion
        $posicion = strpos($palabraWordix, $letraIntento); //busca la letra en la palabra correcta
        if ($posicion === false) { //alternativas que determinan el estado de la letra
            $estado = ESTADO_LETRA_DESCARTADA;//si no se encuentra en la palabra
        } else {
            if ($letraIntento == $palabraWordix[$i]) { 
                $estado = ESTADO_LETRA_ENCONTRADA; //si se encuentra la letra en la posiscion correcta
            } else {
                $estado = ESTADO_LETRA_PERTENECE; //si se encuentra en la palabra
            }
        }
        array_push($estructuraPalabraIntento, ["letra" => $letraIntento, "estado" => $estado]); //almacena en un arreglo el intento con su letra y estado
    }

    array_push($estruturaIntentosWordix, $estructuraPalabraIntento); //actualizacion de la estructura de intentos
    return $estruturaIntentosWordix; //retorna la estructura actualizada 
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

    while ($i < $cantLetras && $estructuraPalabraIntento[$i]["estado"] == ESTADO_LETRA_ENCONTRADA) { //recorrido de las letras de la palabra verificando su estado.
        $i++;
    }

    if ($i == $cantLetras) { //verifica que el recorrido haya sido completo de letras encontradas y asigna verdadero a la variable ganado.
        $ganado = true;
    } else {
        $ganado = false; //le asigna falso a la variable ganado.
    }

    return $ganado;//retorna el estado de la partida en juego.
}

/**
 * función que calcula el puntaje de Wordix en base a: la cantidad de intentos y a la clasificación de letras de cada palabra
 * @return int
 */
function obtenerPuntajeWordix($palabraWordix, $nombreUsuario) {

    //array $arrayPartida
    //int $ptje, $longitudPalabra
    //string $verificarPalabra
    
    $arrayPartida = jugarWordix($palabraWordix, $nombreUsuario); //arreglar , esta mal.
    $ptje = 0;
    //**segun el intento es el puntaje, menor intentos equivale a más puntaje**//
    //**uso el switch en lugar de un if ya que solo hago una comparación y es más limpio, en vez de tener muchas alternativas**//
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
    $verificarPalabra = esPalabra($arrayPartida["palabra"]); //verifico que la palabra ingresada es válida

    if ($verificarPalabra && $longitudPalabra == 5){
    //**acá no usé la función leerPalabra5Letras que verifica la longitud de la palabra para no tener que llamarla todo el tiempo dado que solo necesito veriticar que la palabra tenga 5 letras**//

        for ($i=0; $i < $longitudPalabra; $i++){
            //**no usé un switch para evitar la repetición del acumulador de suma en cada case, porque siempre iba a solo sumar 2 puntos**//
            //**esta primera alternativa da un 2 puntos si la letra es una consonante hasta la M inclusive**//
            if ($arrayPartida["palabra"] == "B" || $arrayPartida["palabra"] == "C" || $arrayPartida["palabra"] == "D" || $arrayPartida["palabra"] == "F" ||     $arrayPartida["palabra"] == "G" || $arrayPartida["palabra"] == "H" || $arrayPartida["palabra"] == "J" ||$arrayPartida["palabra"] == "K" ||$arrayPartida["palabra"]  [$i] == "L" ||$arrayPartida["palabra"] == "M"){ 
                $ptje += 2;
            }

            //**esta segunda sentencia da 1 punto si la letra es vocal**//
            elseif($arrayPartida["palabra"] == "A" || $arrayPartida["palabra"] == "E" || $arrayPartida["palabra"] == "I" || $arrayPartida["palabra"] == "O" ||  $arrayPartida["palabra"] == "U"){
                $ptje += 1;

            }//**la ultima alternativa solo toma a las consonantes a partir de la N, sin contar a las anteriores ni a las vocales, ya que son tomadas en las condiciones previas**//
            else{
                $ptje += 3;
            }
        }
    }else{
        echo "error, palabra erronea o de longitud no aceptada.\n"; //**este mensaje se puede quitar**/
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

    $arregloDeIntentosWordix = []; //inicializa un arreglo para guardar los datos de los intentos.
    $teclado = iniciarTeclado(); //inicializa una variable teclado para dejar disponibles las letras a usar en el intento.
    escribirMensajeBienvenida($nombreUsuario); //imprime por pantalla un mensaje de bienvenida.
    $nroIntento = 1; //inicializa una variable en uno que corresponde al intento "1" para empezar la partida.

    //EMPIEZA A INTERACTUAR EL USUARIO CON EL PROGRAMA
    do {

        echo "Comenzar con el Intento " . $nroIntento . ":\n"; //Imprime mensaje con el nro de intento.
        $palabraIntento = leerPalabra5Letras(); //invoco la funcion que lee la palabra del intento del usuario y se la asigno a una varible $palabraIntento
        $indiceIntento = $nroIntento - 1; //variable que almacena el indice de la palabra del intento inicializada en cero.
        $arregloDeIntentosWordix = analizarPalabraIntento($palabraWordix, $arregloDeIntentosWordix, $palabraIntento); /** actualizo el arreglo con los parametros 
                                                                                                                       * nuevos invocando la funcion que analiza 
                                                                                                                       * la palabra ingresada por el usuario. */
        
        
        $teclado = actualizarTeclado($teclado, $arregloDeIntentosWordix[$indiceIntento]); //actualizacion del teclado.

        /*Mostrar los resultados del análisis: */

        imprimirIntentosWordix($arregloDeIntentosWordix); //muestra por pantalla los intentos realizados y los que faltan.
        escribirTeclado($teclado); //muestra por pantalla el teclado actualizado con los estados de las letras correspondientes.


        /*Determinar si la plabra intento ganó e incrementar la cantidad de intentos */

        $ganoElIntento = esIntentoGanado($arregloDeIntentosWordix[$indiceIntento]); //invoca la funcion para saber si el intento es ganador o continua intentando.
        $nroIntento++; //incrementa en 1 el nro de intento

    } while ($nroIntento <= CANT_INTENTOS && !$ganoElIntento); //corta el ciclo cuando los intentos llegan a 6 o cuando se gana la partida.


    if ($ganoElIntento) { //si la partida se gano entonces.
        $nroIntento--; //se decrementa el nro de intento en uno, ya que antes de finalizar el do while este se ve incrementado.
        $puntaje = obtenerPuntajeWordix($palabraWordix, $nombreUsuario);//**modificado en base a la función anterior**//
        echo "Adivinó la palabra Wordix en el intento " . $nroIntento . "!: " . $palabraIntento . " Obtuvo $puntaje puntos!"; //mensaje con los datos de la partida cuando gana la palabra.
    } else { //si la partida se pierde.
        $nroIntento = 0; //reset intento.
        $puntaje = 0; //reset puntaje.
        echo "Seguí Jugando Wordix, la próxima será! ";
    }

    //arreglo que almacena los datos de la partida jugada, gane o pierda.
    $partida = [
        "palabraWordix" => $palabraWordix,
        "jugador" => $nombreUsuario,
        "intentos" => $nroIntento,
        "puntaje" => $puntaje
    ];

    return $partida;
}
