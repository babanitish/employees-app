<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Department[]|\Cake\Collection\CollectionInterface $departments
 */
?>
<div class="departments index content">
    <?= $this->Html->link(__('New Department'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Departments') ?></h3>
    <div class="table-responsive">

        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('dept_no') ?></th>
                    <th><?= $this->Paginator->sort('dept_name') ?></th>
                    <th><?= $this->Paginator->sort('Nb. Employees') ?></th>
                    <th><?= $this->Paginator->sort('Postes vacants') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($departments as $department): ?>
                <tr>
                    <td><?= h($department->dept_no) ?></td>
                    <td><?= h($department->dept_name) ?></td>
                    <td><?= $this->Number->format(h($department->nbEmployees)) ?></td>
                    <td><?= h(count($department->offers)) ?></td>
                    <td class="actions">
						<?= $this->Html->link(__('<i class="fas fa-eye"></i>'), 
						    ['action' => 'view', $department->dept_no],
                            ['escape' => false]) ?>
                        <?= $this->Html->link('<i class="fas fa-edit"></i>', 
                            ['action' => 'edit', $department->dept_no],
                            ['escape' => false]) ?>
                        <?= $this->Form->postLink('<i class="fas fa-trash"></i>', 
                            ['action' => 'delete', $department->dept_no],
                            ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $department->dept_no)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
