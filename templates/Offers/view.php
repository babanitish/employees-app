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
    <h3><?= h($offer->offer_no) ?></h3>
    <table  class="table-responsive">
        <tr>
            <th><?= __('Dept No') ?></th>
            <td><?= h($offer->dept_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($offer->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Offer No') ?></th>
            <td><?= $this->Number->format($offer->offer_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Title No') ?></th>
            <td><?= $this->Number->format($offer->title_no) ?></td>
        </tr>
    </table>
     <?= $this->Html->link(__('Apply'), ['action'=>'apply', $offer->offer_no],  ['class' => 'button'] )?>
</div>

