<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<div class="departments form content">
    <?= $this->Form->create($department , ['enctype' => 'multipart/form-data']) ?>
        <legend><?= __('Ajouter un département ') ?></legend>
        <?php
        echo $this->Form->control('dept_name', ['label' => __('Nom')]);
            echo '<label for="description">'.__('Description').'</label>';
            echo $this->Form->textarea('description', ['type'=>'text', 'rows'=>'6']);
            echo $this->Form->control('address', ['label' => __('Addresse')]);
            
            echo '<p><span>Upload new picture: </span>';
            echo $this->Form->file('uploadedPic', ['required'=>false]).'<p/>';
            
            echo '<p><span>Upload new ROI: </span>';
            echo $this->Form->file('uploadedROI', ['required'=>false]).'<p/>';
            
            
        ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

