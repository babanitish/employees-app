<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>

<div class="departments view content">
   	<?= $this->Html->Link('<i class="fas fa-arrow-circle-left"></i> '.__('All departments'), ['action'=>'index'],['escape' => false])?>
   
    <div class="view-options">
                <?= $this->Html->link('<i class="fas fa-edit"></i>', 
                    ['action' => 'edit', $department->dept_no],
                    ['escape' => false]) ?>
                <?= $this->Form->postLink('<i class="fas fa-trash"></i>', 
                    ['action' => 'delete', $department->dept_no],
                    ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $department->dept_no)]) ?>
    </div>
    <h1><?= __($department->dept_name) ?></h1>
    <?= $this->Html->image('departments/'.$department->picture, [
                            "alt" => __("Photo d'équipe du départment"),
                            "class"=>"card-img-top"
                    ]);?>
    <table>
        <tr>
            <th><?= __('Numéro de départmement') ?></th>
            <td><?= h($department->dept_no) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($department->description) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Manager actuel') ?></th>
            
            <td>
            <?php if ($department->manager) { ?>
            	<?= $department->manager->picture ? $this->Html->image('employees/'.$department->manager->picture).'<br>' : ''?>
            	<?= $department->manager->first_name.' '.$department->manager->last_name ?>
            <?php } else { ?>
            	<?= __('Aucun manager actuellement') ?>
            <?php } ?>
            </td>
        </tr>
        <tr>
            <th><?= __('Adresse') ?></th>
            <td><?= h($department->address) ?></td>
        </tr>
        <?php //if($this->request->getAttribute('authentication')->getIdentity()->currentDepartment == $department->dept_no) { ?>
        <tr>
        	
            <th><?= __('ROI') ?></th>
            <td><?= $this->Html->link(__('Telecharger le ROI'), '/docs/ROI/'.$department->roi, ['download'=>$department->roi]) ?></td>
        </tr>
       <?php //} ?>
        
    </table>
    
    <h2><?= __('Managers') ?></h2>
    <?php  if(count($department->managers)>0){ ?>
        <table>
        	<thead>
            	<tr>
            		<th><?= __('Nom') ?></th>
            		<th><?= __('Date de début') ?></th>
            		<th><?= __('Date de fin') ?></th>
            	</tr>
            </thead>
            <?php foreach($department->managers as $manager) {?>
            
            <tbody>
            <tr>
            	<td><?= $manager->first_name.' '.$manager->last_name ?></td>
                <td><?= $this->Time->format($manager->_joinData->from_date, 'd/M/Y') ?></td>
                <td><?= $this->Time->format($manager->_joinData->to_date, 'd/M/Y')=='1/1/9999' ? __('Présent') :  $this->Time->format($manager->_joinData->to_date, 'd/M/Y')?></td>
                
            </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
    	<p><?= __('Aucun manager') ?></p>
    <?php } ?>
    
    <h2><?= __('Postes vacants') ?></h2>
    
    <?php if (!empty($department->offers)) { ?>
    <table>
    	<thead>
        	<tr>
        		<th><?= __('Titre') ?></th>
        		<th colspan="2"><?= __('Description') ?></th>
        	</tr>
        </thead>
        <?php foreach($department->offers as $offer) {?>
        
        <tbody>
        <tr>
        	<td><?= __($offer->titleName) ?></td>
        	<td><?= __($offer->description) ?></td>
            <td><?= $this->Html->link(__('Voir'), ['controller'=>'offers', 'action'=>'view', $offer->offer_no]) ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } else {  ?>
    	<p><?= __('Aucun poste vacant') ?></p>
    <?php } ?>
</div>