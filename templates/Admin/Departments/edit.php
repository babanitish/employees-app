<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>

<div class="departments form content">
    <?= $this->Form->create($department , ['enctype' => 'multipart/form-data']) ?>
        <legend><?= __('Modifier le département ').$department->dept_no ?></legend>
        <?php
        echo $this->Form->control('dept_name', ['label' => __('Nom')]);
            echo '<label for="description">'.__('Description').'</label>';
            echo $this->Form->textarea('description', ['type'=>'text', 'rows'=>'6']);
            echo $this->Form->control('address', ['label' => __('Addresse')]);
            
            
            echo '<label for="picture">'.__('Image').'</label><br/>';
            echo $this->Html->image('departments/'.$department->picture, ['height'=>'200px']);
            echo '<p><span>Upload new picture: </span>';
            echo $this->Form->file('uploadedPic', ['required'=>false]).'<p/>';
            
            echo '<label for="roi">'.__('ROI').'</label><br/>';
            echo $this->Html->link('View current ROI', '/docs/ROI/'.$department->roi);
            echo '<p><span>Upload new ROI: </span>';
            echo $this->Form->file('uploadedROI', ['required'=>false]).'<p/>';
            
            
        ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

