<?php

include 'class.Personne.php';

$salarie1 = new Salarie('ALBERT', 20, 1500);
$salarie2 = new Salarie('DURAND', 28, 2000);

echo $salarie1->getInfos() . '<br />';
echo $salarie2->getInfos() . '<br />';
?>