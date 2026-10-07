<?php

// Test 1: Création et getters de Produit
$p = new Produit('P001', 'Clavier', 150.0, 10);
verifier($p->getReference() === 'P001', 'Produit: Get Reference');
verifier($p->getNom() === 'Clavier', 'Produit: Get Nom');
verifier(abs($p->getPrix() - 150.0) < 0.001, 'Produit: Get Prix');
verifier($p->getQuantite() === 10, 'La quantité initiale est 10');

// Test 2: Retrait de quantité
$p->retirerQuantite(3);
verifier($p->getQuantite() === 7, 'Après retrait de 3, il en reste 7');
verifier(abs($p->valeurStock() - 1050.0) < 0.001, 'La valeur du stock vaut 7 x 150');

// Test 3: Ajout de quantité
$p->ajouterQuantite(5);
verifier($p->getQuantite() === 12, 'Après ajout de 5, la quantité vaut 12');

// Test 4: Exception sur prix négatif à la construction
$exceptionPrixNegatif = false;
try {
    new Produit('P002', 'Souris', -10.0, 5);
} catch (InvalidArgumentException $e) {
    $exceptionPrixNegatif = true;
}
verifier($exceptionPrixNegatif, 'Produit: Exception levée si prix négatif');

// Test 5: Exception sur quantité négative à la construction
$exceptionQuantiteNégative = false;
try {
    new Produit('P003', 'Ecran', 200.0, -5);
} catch (InvalidArgumentException $e) {
    $exceptionQuantiteNégative = true;
}
verifier($exceptionQuantiteNégative, 'Produit: Exception levée si quantité négative');

// Test 6: Exception si ajout non positif
$exceptionAjoutInvalide = false;
try {
    $p->ajouterQuantite(0);
} catch (InvalidArgumentException $e) {
    $exceptionAjoutInvalide = true;
}
verifier($exceptionAjoutInvalide, 'Produit: Exception levée si ajout <= 0');

// Test 7: Exception si retrait supérieur au stock
$exceptionRetraitExcessif = false;
try {
    $p->retirerQuantite(100);
} catch (InvalidArgumentException $e) {
    $exceptionRetraitExcessif = true;
}
verifier($exceptionRetraitExcessif, 'Produit: Exception levée si stock insuffisant');
