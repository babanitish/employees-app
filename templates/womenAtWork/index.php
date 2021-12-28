<?php

use App\View\Cell\InboxCell;
?>
<p>	Proportion de femmes et d’hommes au total </p>
<?= $this->cell('Inbox') ?>
<p>Courbe annuelle du nombre de femmes au total</p>
<?= $this->cell('womenYear') ?>
<p>Les 3 départements présentant le moins de femmes</p>
<?= $this->cell('womenDept') ?>

<p>Le nombre de femmes manager</p>

<?= $this->cell('womenManager') ?>