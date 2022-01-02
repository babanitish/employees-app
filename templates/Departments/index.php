<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department[]|\Cake\Collection\CollectionInterface $departments
 */
?>
<div class="departments index content">
    <h1><?= __('Departments') ?></h1>
    <div class="table-responsive">
        <div class="card-deck">
          <?php foreach ($departments as $department): ?>
          <div class="card">
            <?= $this->Html->image(h('departments/'.$department->picture), [
                                    "alt" => "department picture",
                                    "class" =>"card-img-top",
                                    "width"=>"250px",
                                    "height"=>"150px",
                                    "style"=> "margin-bottom:0px;object-fit: cover;"
           ]);?>
            <div class="card-body">
              <h2 class="card-title"> 
              		<?= $this->Html->link(__($department->dept_name), 
				    ['action' => 'view', $department->dept_no],
                    ['escape' => false]) ?>
              </h2>
              <p class="card-text"><?= $this->Number->format(h($department->nbEmployees)) ?> <?= __('employees') ?></p>
              
              <?php  if (count($department->offers) > 0) { ?>
              	<p class="card-text important"><?= h(count($department->offers)). (count($department->offers)==1 ? __(' job offer') : __(' job offers')) ?></p>            
              <?php } else { ?>
              	<p><?= __('No available jobs') ?></p>
              <?php } ?>

            </div>
          </div>
          <?php endforeach; ?>
        </div>
	</div>
</div>
