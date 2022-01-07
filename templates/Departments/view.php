<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department $department
 */
?>


<div class="departments view content">
	<div class="view-options">
		<?= $this->Html->link('<i class="fas fa-arrow-circle-left"></i> '.__('All departments '), ['action'=>'index'],['escape' => false])?>
	</div>
    <h1><?= __($department->dept_name) ?></h1>
    <?php if($department->picture) echo $this->Html->image('departments/'.$department->picture, [
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
        <tr>
            <th><?= __('Salaire moyen') ?></th>
            <td><?= $department->nbEmployees > 0  ? $department->averageEmployeeSalary.'&#128' : __('Aucun employé')?></td>
        </tr>
        <?php //if($this->request->getAttribute('authentication')->getIdentity()->currentDepartment == $department->dept_no) { ?>
        <tr>
        	
            <th><?= __('ROI') ?></th>
            <td><?= $department->roi ? $this->Html->link(__('Telecharger le ROI'), '/docs/ROI/'.$department->roi, ['download'=>$department->roi]) : '' ?></td>
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
            <td><?= $this->Html->link(__('Postuler'), ['controller'=>'offers', 'action'=>'apply', $offer->offer_no]) ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } else {  ?>
    	<p><?= __('Aucun poste vacant') ?></p>
    <?php } ?>
</div>
