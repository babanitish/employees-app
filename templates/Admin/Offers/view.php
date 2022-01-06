<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>
<div class="offers view content">
	<?= $this->Html->Link(__('View all offers'), ['controller'=>'offers', 'action'=>'index'])?>
	<?= $this->Html->Link(__('View department'), ['controller'=>'departments', 'action'=>'view', $offer->dept_no])?>
	<div class="view-options">
                <?= $this->Html->link('<i class="fas fa-edit"></i>', 
                    ['action' => 'edit', $offer->offer_no],
                    ['escape' => false]) ?>
                <?= $this->Form->postLink('<i class="fas fa-trash"></i>', 
                    ['action' => 'delete', $offer->offer_no],
                    ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $offer->offer_no)]) ?>
    </div>
    
    
        <h3><?= h($offer->offer_no) ?></h3>
        <table>
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


</div>
