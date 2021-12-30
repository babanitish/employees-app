<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $department->dept_no],
                ['confirm' => __('Are you sure you want to delete # {0}?', $department->dept_no), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Departments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="departments form content">
            <?= $this->Form->create($department , ['enctype' => 'multipart/form-data']) ?>
            <fieldset>
                <legend><?= __('Edit Department') ?></legend>
                <?php
                    echo $this->Form->control('dept_name');
                    echo '<label for="description">Description</label>';
                    echo $this->Form->textarea('description', ['type'=>'text', 'rows'=>'6']);
                    echo $this->Form->control('address');
                    
                    
                    echo '<label for="picture">'.__('Picture').'</label><br/>';
                    echo $this->Html->image('departments/'.$department->picture, ['height'=>'200px']);
                    echo '<p><span>Upload new picture: </span>';
                    echo $this->Form->file('uploadedPic', ['required'=>false]).'<p/>';
                    
                    echo '<label for="roi">'.__('ROI').'</label><br/>';
                    echo $this->Html->link('View current ROI', '/docs/ROI/'.$department->roi);
                    echo '<p><span>Upload new ROI: </span>';
                    echo $this->Form->file('uploadedROI', ['required'=>false]).'<p/>';
                    
                    
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
