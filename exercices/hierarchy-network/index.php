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

do{
    $f = stream_get_line(STDIN, 1000000, PHP_EOL);
    if($f!==false){
        $input[] = $f;
    }
}while($f!==false);


/**
 * Construit toute la hiérarchie du réseau
 *
 * @param array $agents Tous les agents du réseau
 * @param array $hierarchy Hiérarchie actuelle (par niveau)
 * @param int $n L'agent actuellement parcouru
 * @param int $level Le niveau dans lequel on est
 *
 */
function getHierarchy(array $agents, array &$hierarchy, int $n = 0, int $level = 1): void
{
    // Parcours de tous les agents
    foreach ($agents as $agent) {
        // Analyse de la hiérarchie du niveau $level

        // On extrait les 2 nombres de la chaîne de caractère
        $agentHierarchy = explode(' ', $agent);

        // Le premier nombre représente le subordonné
        $lacquey = $agentHierarchy[0];

        // Le second nombre représente le boss
        $boss = $agentHierarchy[1];

        // Si jamais l'id de l'agent parcouru est un boss (son numéro arrive en 2ème dans la chaîne extraite)
        if ($boss == $n) {
            // On met à jour la hiérarchie (on a trouvé un agent supplémentaire pour le niveau actuellement parcouru)
            $hierarchy[$level]++;

            // Fonction récursive : fonction qui va s'appeler elle-même
            // On va aller étudier la hiérarchie dans le niveau en-dessous
            getHierarchy($agents, $hierarchy, $lacquey, $level + 1);
        }
    }
}

// On extrait la première valeur du tableau
array_shift($input);


// Création du tableau représentant la hiérarchie
$hierarchy = array_fill(0, 10, 0);
$hierarchy[0] = 1;

// On appelle pour la première fois notre fonction
getHierarchy($input, $hierarchy);

// Affichage final
echo implode(' ', $hierarchy);

?>