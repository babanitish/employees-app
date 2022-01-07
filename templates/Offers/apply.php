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
	<table class="table-responsive">
			<tr>
				<th>Department</th>
				<td><?= $offer->department->dept_name ?></td>
			</tr>
			<tr>
				<th>Title</th>
				<td><?= $offer->title->name ?></td>
			</tr>
			<tr>
				<th>Description</th>
				<td><?= $offer->description ?></td>
			</tr>
    </table>
    <?= $this->Form->create(null, ['type'=>'post', 'enctype'=>'multipart/form-data'])?>
        <label><?= __('Upload your CV')?></label>
        <?= $this->Form->file('uploadedCV'); ?>
        <?= $this->Form->submit(__('Send application')); ?>
    <?= $this->Form->end()?>
</div>


