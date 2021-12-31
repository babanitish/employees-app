<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer[]|\Cake\Collection\CollectionInterface $offers
 */
?>
<div class="offers index content">
    <h3><?= __('Offers') ?></h3>
    <div class="table-responsive">
    
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('Department') ?></th>
                    <th><?= $this->Paginator->sort('Title') ?></th>
                    <th colspan="2"><?= __('Description') ?></th>
                    
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($offers as $offer): ?>
                <tr>
                    <td><?= h($offer->department->dept_name) ?></td>
                    <td><?= h($offer->title->name) ?></td>
                    <td><?= h($offer->description) ?></td>
                    <td class="actions">
						<?= $this->Html->link(__('<i class="fas fa-eye"></i>'), 
						    ['action' => 'view', $offer->offer_no],
                            ['escape' => false]) ?>
                        <?= $this->Html->link('<i class="fas fa-edit"></i>', 
                            ['action' => 'edit', $offer->offer_no],
                            ['escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash"></i>', 
                            ['action' => 'delete', $offer->offer_no],
                            ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $offer->offer_no)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
