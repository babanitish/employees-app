<?php

use App\View\Cell\InboxCell;
?>
<p>	Proportion de femmes et dâ€™hommes au total </p>
<?= $this->cell('Inbox') ?>
<p>Nombre de femmes engagées par année</p>
<?= $this->cell('womenYear') ?>


<?= $this->cell('womenDept') ?>

<p>Le nombre de femmes manager</p>

<?= $this->cell('womenManager') ?>