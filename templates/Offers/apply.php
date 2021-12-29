<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Offer $offer
 */
?>

<div>
	<label>Department</label><p><?= $offer->department->dept_name ?></p>
	<label>Title</label><p><?= $offer->title->name ?></p>
	<label>Description</label><p><?= $offer->description ?></p>
</div>
<div class="offers form content">
<?= $this->Form->create(null, ['type'=>'post', 'enctype'=>'multipart/form-data'])?>
    <label><?= __('Upload your CV')?></label>
    <?= $this->Form->file('uploadedCV'); ?>
    <?= $this->Form->submit(__('Send application')); ?>
<?= $this->Form->end()?>
</div>


