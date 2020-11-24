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

// Données en entrée, pas besoin de toucher au code ici
do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);


// VOTRE CODE CI-DESSOUS
// --------------------------------------------------------------------

// On sort la première ligne du tableau
$totalPeople = array_shift($input);

// Il ne reste plus que les données des participants dans notre tableau
// var_dump($input);

// Création d'un tableau vide qui va stocker les noms et les tailles sous forme de clé/valeur
$sizes = [];

// On parcourt chaque ligne du tableau des données
foreach ($input as $row) {
    // Affiche les données dans la sortie erreur (STDERR)
    error_log($row);

    // Une ligne ($row) est une chaîne de caractères avec le nom de la personne et la taille de la paille séparés par un espace
    // Extrait les informations d'une chaînes de caractères à partir d'un séparateur
    $peopleSize = explode(' ', $row);
    
    // nom du participant ($data[0]) => taille de sa paille ($data[1])
    $sizes[$peopleSize[0]] = $peopleSize[1];
}

// Récupération de la paille (la valeur) la plus petite
$minSize = min($sizes);

// Récupérer la clé (ou l'index) associée à cette valeur
// => le (pauvre) participant qui a la plus petite paille et qui va devoir dormir dehors
$poorGuy = array_search($minSize, $sizes);

echo $poorGuy;

?>