<?php
/*******
 * Read input from STDIN
 * Use echo or print to output your result to STDOUT, use the PHP_EOL constant at the end of each result line.
 * Use:
 *     fwrite(STDERR, "hello, world!" . PHP_EOL);
 * or
 *		error_log("hello, world!" . PHP_EOL);
 * to output debugging information to STDERR
 * ***/

do{
    $f = stream_get_line(STDIN, 1000000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);

// Nombre de tweets total du compte + extraction de la donnée du tableau
$totalPosts = array_shift($input);

// Compteur du nombre de tweets suspicieux
$suspiciousPosts = 0;

// Parcours de toutes les heures correspon
foreach ($input as $time) {
    // On sépare l'heure et les minutes dans un tableau
    $time = explode(':', $time);
    $hour = $time[0];

    // Si l'heure est comprise entre 20h et 7h59
    if ($hour >= 20 || $hour < 8) {
        // On augmente le nombre de tweets suspicieux
        $suspiciousPosts++;
    }
}

// Affichage final
// S'il y a plus de 50% de tweets suspicieux, le compte est suspicieux
if ($suspiciousPosts / $totalPosts > 0.5) {
    echo 'SUSPICIOUS';
} else {
    echo 'OK';
}

?>