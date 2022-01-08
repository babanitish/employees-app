<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>


<div class="offers form content">
	<div class="view-options">
		<?= $this->Html->link('<i class="fas fa-arrow-circle-left"></i> '.__('All offers '), ['action'=>'index'],['escape' => false])?>
	</div>
    <h1><?= __('Edit Offer') ?></h1>
    <?= $this->Form->create($offer) ?>
        <?=  $this->Form->control('title_no', ['options' => $titles, 'label' => 'Title']); ?>
        <?=  $this->Form->control('dept_no', ['options' => $departments, 'label' => 'Department']); ?>
        <?=  $this->Form->control('description', ['label' => 'Description']); ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
 </div>


