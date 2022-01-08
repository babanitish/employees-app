<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>

<div class="departments form content">
	<div class="view-options">
		<?= $this->Html->link('<i class="fas fa-arrow-circle-left"></i> '.__('All departments '), ['action'=>'index'],['escape' => false])?>
	</div>
    <?= $this->Form->create($department , ['enctype' => 'multipart/form-data']) ?>
		<h1><?= __('Modifier le département ').$department->dept_no ?></h1>

        <?= $this->Form->control('dept_name', ['label' => __('Nom')]); ?>
        <label for="description"><?= __('Description') ?></label>
        <?= $this->Form->textarea('description', ['type'=>'text', 'rows'=>'6']); ?>
        <?= $this->Form->control('address', ['label' => __('Addresse')]); ?>
            
            
        <label for="picture"><?= __('Image') ?></label><br/>
        <?= $this->Html->image('departments/'.$department->picture, ['height'=>'200px']); ?>
        <div>
        	<span><?= __('Upload new picture:') ?></span>
        	<?= $this->Form->file('uploadedPic', ['required'=>false]) ?>
        </div>
            
        <label for="roi"><?= __('ROI') ?></label><br/>
        <?= $this->Html->link('View current ROI', '/docs/ROI/'.$department->roi); ?>
        <div>
        	<span> <?= __('Upload new ROI:') ?></span>
        	<?= $this->Form->file('uploadedROI', ['required'=>false]) ?>
        </div>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

