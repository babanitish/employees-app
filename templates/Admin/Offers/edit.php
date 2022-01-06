<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>


    <div class="offers form content">
    	<?= $this->Html->Link(__('Back to offer'), ['controller'=>'offers', 'action'=>'view', $offer->offer_no])?>
        <?= $this->Form->create($offer) ?>

            <legend><?= __('Edit Offer') ?></legend>
            <?php
                echo $this->Form->control('dept_no');
                echo $this->Form->control('title_no');
                echo $this->Form->control('description');
            ?>

        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>


