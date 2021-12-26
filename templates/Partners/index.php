<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Partner[]|\Cake\Collection\CollectionInterface $partners
 */
?>

<div class=" index content">

    <h1><?= __('Retrouvez la liste de nos partenaires') ?></h1>
    
    <div class="partners">
    <?php foreach($partners as $partner){ ?>
    	<span>
    	
    	<?= $this->Html->link( $this->Html->image('partners/'.$partner->picture, ['height'=>'200px', 'alt'=>$partner->name]).$partner->name, 
    	    $partner->link, ['target' => '_blank', 'escape' => false]) ?>
    	</span>
    <?php } ?>
    </div>
</div>
</div>