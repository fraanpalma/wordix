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
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS"
        /* Agregar 5 palabras más */
    ];

    return ($coleccionPalabras);
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



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
