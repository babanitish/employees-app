<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Offer'), ['action' => 'edit', $offer->offer_no], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Offer'), ['action' => 'delete', $offer->offer_no], ['confirm' => __('Are you sure you want to delete # {0}?', $offer->offer_no), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Offers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Offer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="offers view content">
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
    </div>
</div>
