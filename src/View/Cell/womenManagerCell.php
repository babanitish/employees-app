<?php

declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Inbox cell
 */
class WomenManagerCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
       
        $query = $this->getTableLocator()->get('employees')->find();

        $query->select([
            'nbWomenManager' => $query->func()->count('employees.emp_no')
        ])
            ->innerJoinWith('deptManager')
            ->where([
                'gender' => 'F',
            ]);
            
        $result = $query->all();
        foreach ($result as $woManager) {
           return $woManager;
        }
        $this->set(compact('woManager'));
    }
}
