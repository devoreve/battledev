# battledev

Vous trouverez dans ce dépôt les corrections de quelques exercices de niveau facile de la BattleDev de ces 2 dernières années.
Le but de ces corrections est de vous montrer comment aborder l'exercice mais aussi comment coder sur l'interface qui peut être un peu déroutante si vous l'utilisez pour la première fois.

## Conseils et Astuces
Attention dans la liste des informations ci-dessous, mes conseils portent sur le langage php. Il faudra adapter si vous travaillez sur un autre langage.

### Bien lire l'énoncé
Cela peut paraître un peu évident mais il est important de bien lire et comprendre l'énoncé avant de vous mettre à coder. Prenez le temps de bien déterminer ce que l'interface attend comme résultat.

### Afficher les données reçues
Pour chaque exercice, un jeu de données sera stocké dans un tableau. Pensez à l'afficher (à l'aide par exemple de la fonction var_dump) pour voir comment sont formatées les informations et comment les manipuler correctement. Cela vous aidera également à mieux comprendre ce qui est attendu de vous.

### Parcourir facilement les données
Favoriser l'utilisation de la boucle foreach pour parcourir les données reçues.

Voici un exemple tiré d'un exercice d'une BattleDev : 
*Ligne 1 : un entier N compris entre 1 et 10 000 correspondant au nombre de tirages affichés dans l'historique.
Lignes 2 à N+1 : un chiffre entre 1 et 9 correspondant au numéro de la carte tirée.*

Dans ce cas là on est tenté de faire quelque chose de similaire à ça pour parcourir les numéros de cartes : 

```php
for ($i = 1; $i <= $input[0] + 1; $i++) {
    // Traitement
}
```

Ce qui me semble beaucoup trop approximatif. Je recommanderai de plutôt privilégier l'approche suivante :
```php
// On retire le premier élément du tableau (le nombre de tirages)
$totaldraws = array_shift($input);

// On parcourt normalement avec une boucle foreach
foreach ($input as $card) {
    // Traitement
}
```

### Fonctions utiles
Voici une liste non exhaustive de fonctions utiles pour ce type d'exercices. Comme indiqué plus haut, ce sont des fonctions php, à adapter donc en fonction de votre langage si vous en choisissez un autre.

*Debug*
* var_dump
* error_log

*Tri*
* sort
* asort
* usort

*Tableaux*
* array_search
* array_shift
* array_flip
* min et max
* implode

*Chaînes de caractères*
* explode

*Utilitaires*
* empty
* isset