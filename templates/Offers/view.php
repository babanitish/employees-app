<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>

<div class="offers view content">
	<div class="view-options">
		<?= $this->Html->link('<i class="fas fa-arrow-circle-left"></i> '.__('All offers '), ['action'=>'index'],['escape' => false])?>
	</div>
    <h3><?= __('Offer number '.$offer->offer_no) ?></h3>
    <table  class="table-responsive">
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= __($offer->department->dept_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= __($offer->title->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($offer->description) ?></td>
        </tr>
    </table>
     <?= $this->Html->link(__('Apply'), ['action'=>'apply', $offer->offer_no],  ['class' => 'button'] )?>
</div>

