<?php

use App\View\Cell\InboxCell;
?>
<p>	Proportion de femmes et d’hommes au total </p>
<?= $this->cell('Inbox') ?>
<p>Nombre de femmes engag�es par ann�e</p>
<?= $this->cell('womenYear') ?>


<?= $this->cell('womenDept') ?>

<p>Le nombre de femmes manager</p>

<?= $this->cell('womenManager') ?>