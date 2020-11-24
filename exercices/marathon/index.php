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

error_log("NOUVEAU JEU DE TEST" . PHP_EOL);
error_log('-------------------');

// Première ligne du tableau que l'on extrait : le classement initial
$initRank = array_shift($input);

// On parcourt les données de chaque km
foreach ($input as $number => $km) {
    // Affichage des données dans la sortie des erreurs
    error_log($number . " : " .$km);
    
    $data = explode(' ', $km);
    
    // Nombre de personnes qui vous ont dépassé
    $fasters = $data[0];
    
    // Nombre de personnes que vous avez dépassé
    $slowers = $data[1];
    
    // Quand on vous dépasse votre rang est plus élevé (=> le rang augmente)
    $initRank += $fasters;
    
    // Quand vous dépassez des coureurs votre rang est plus bas (=> le rang diminue)
    $initRank -= $slowers;
}

// Affichage de la solution pour le debug
error_log("SOLUTION : " . $initRank);

if ($initRank <= 100) {
    // Cas top 100
    echo 1000;
} elseif ($initRank <= 10000) {
    // A partir de la 101ème place jusque 10000
    echo 100;
} else {
    // Au-delà de la 10000ème place le marathon est abandonné
    echo 'KO';
}

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>