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
        <h1><?= __('Ajouter un département ') ?></h1>

        <?= $this->Form->control('dept_name', ['label' => __('Nom')]) ?>
            <label for="description"><?= __('Description') ?></label>
            <?= $this->Form->textarea('description', ['type'=>'text', 'rows'=>'6']) ?>
            <?= $this->Form->control('address', ['label' => __('Addresse')]) ?>
            
            <div>
            	<label><?= __('Upload picture ') ?></label><br>
            	<?= $this->Form->file('uploadedPic', ['required'=>false]) ?>
            </div>
            
            <div>
            	<label><?=  __('Upload ROI') ?></label><br>
            	<?= $this->Form->file('uploadedROI', ['required'=>false]) ?>
            </div>
  
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

