<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DeptManager $deptManager
 */
?>
<?php //dd($deptManagers) ?>
<div class="deptManager view content">
	<?= $this->Html->link(__('Retour aux départements'), ['controller'=>'departments','action'=>'index']) ?>
     <h1><?= __('Managers du départment '.$dept_no) ?></h1>
    <?php  if(count($deptManagers)>0){ ?>
        <table>
        	<thead>
            	<tr>
            		<th><?= __('Nom') ?></th>
            		<th><?= __('Date de début') ?></th>
            		<th><?= __('Date de fin') ?></th>
            		<th><?= __('Actions') ?></th>
            	</tr>
            </thead>
            <tbody>
            <?php foreach($deptManagers as $deptManager) {?>
            <tr>
            	<td><?= $deptManager->employee->first_name.' '.$deptManager->employee->last_name ?></td>
                <td><?= $this->Time->format($deptManager->from_date, 'd/M/Y') ?></td>
                <?php  if ($this->Time->format($deptManager->to_date, 'd/M/Y')=='1/1/9999'){ ?>
                	<td><?= __('Présent') ?></td>
                	<td><?= $this->Form->postLink(__('Révoquer'), ['action'=>'revoke', $deptManager->emp_no], ['confirm' => __('Are you sure you want to revoque employee # {0}?', $deptManager->emp_no)]) ?></td>
                <?php  } else { ?>	
                	<td colspan="2"><?= $this->Time->format($deptManager->to_date, 'd/M/Y')?></td>
                 <?php } ?>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
    	<p><?= __('Aucun manager') ?></p>
    <?php } ?>
    <p><?= $this->Html->link(__('Nommer un nouveau manager'), ['controller'=>'deptManager', 'action'=>'add', $dept_no], ['class' => 'button'])?>
</div>

