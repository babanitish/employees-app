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
                    <td><?= $this->Html->link(__('Postuler'), ['action' => 'apply', $offer->offer_no])?></td>
                    <td class="actions">
						<?= $this->Html->link(__('<i class="fas fa-eye"></i>'), 
						    ['action' => 'view', $offer->offer_no],
                            ['escape' => false]) ?>
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
