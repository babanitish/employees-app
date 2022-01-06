<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>


<div class="offers form content">
    <h1><?= __('Edit Offer') ?></h1>
    <?= $this->Form->create($offer) ?>

        
        <?php
            echo $this->Form->control('title_no', ['options' => $titles]);
            echo $this->Form->control('dept_no', ['options' => $departments]);
            echo $this->Form->control('description');
        ?>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
 </div>


