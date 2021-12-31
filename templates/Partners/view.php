<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partner $partner
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Partner'), ['action' => 'edit', $partner->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Partner'), ['action' => 'delete', $partner->id], ['confirm' => __('Are you sure you want to delete # {0}?', $partner->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Partners'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Partner'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="partners view content">
            <h3><?= h($partner->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($partner->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Link') ?></th>
                    <td><?= h($partner->link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Picture') ?></th>
                    <td><?= h($partner->picture) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($partner->id) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
