<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>
<div class="offers view content">
	<?= $this->Html->Link('<i class="fas fa-arrow-circle-left"></i> '.__('All offers'), ['action'=>'index'],['escape' => false])?>
	<div class="view-options">
                <?= $this->Html->link('<i class="fas fa-edit"></i>', 
                    ['action' => 'edit', $offer->offer_no],
                    ['escape' => false]) ?>
                <?= $this->Form->postLink('<i class="fas fa-trash"></i>', 
                    ['action' => 'delete', $offer->offer_no],
                    ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $offer->offer_no)]) ?>
    </div>
    
    
        <h3><?= __('Offer number '.$offer->offer_no) ?></h3>
        <table>
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


</div>
