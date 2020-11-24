<?php
/*******
 * Read input from STDIN
 * Use echo or print to output your result to STDOUT, use the PHP_EOL constant at the end of each result line.
 * Use:
 *     fwrite(STDERR, "hello, world!" . PHP_EOL);
 * or
 *      error_log("hello, world!" . PHP_EOL);
 * to output debugging information to STDERR
 * ***/

// Données en entrée, pas besoin de toucher au code ici
do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);


// VOTRE CODE CI-DESSOUS
// --------------------------------------------------------------------

/* Objectifs :
 - Récupérer la plus petite planche
 - Retirer cette valeur à chacune des planches
 */
 
// Plus petite planche
$min = min($input);

// Centimètres de bois à jeter
$trash = 0;

// Pour chaque planche de bois on retire la longueur de la plus petite planche
foreach ($input as $size) {
    $trash += $size - $min;
}

echo $trash;

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>