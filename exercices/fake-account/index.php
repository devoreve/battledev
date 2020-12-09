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

// On retire la première donnée du tableau (qui n'est pas utile pour le parcours)
array_shift($input);

// Compteur de comptes suspicieux
$suspiciousAccounts = 0;

foreach ($input as $account) {
    // Si les 5 derniers caractères forment un nombre
    if (ctype_digit(substr($account, -5))) {
        // On incrémente le nombre de comptes suspicieux
        $suspiciousAccounts++;
    }
}

// Affichage final
echo $suspiciousAccounts;

?>