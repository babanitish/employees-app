<?php

declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Inbox cell
 */
class WomenDeptCell extends Cell
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
        $deptNameMoreWo = [];
        $nbDeptMoreWo = [];
        $deptNameLessWo = [];
        $nbDeptLessWo = [];
        $query = $this->getTableLocator()->get('employees')->find();

        $leastWomen = $query->select([
            'deptName' => 'departments.dept_name',
            'nbWomen' => $query->func()->count('employees.emp_no')
                ])
            ->innerJoinWith('departments')
            ->where([
                'gender' => 'F',
                ])
            ->group([
                'departments.dept_no'
                ])

            ->orderAsc($query->func()->count('employees.emp_no'))
            ->limit(3);
        $query = $this->getTableLocator()->get('employees')->find();
        $mostWomen =  $query->select([
            'deptName' => 'departments.dept_name',
            'nbWomen' => $query->func()->count('employees.emp_no')
                ])
            ->innerJoinWith('departments')
            ->where([
                'gender' => 'F',
                ])
            ->group([
                'departments.dept_no'
                ])
            
            ->orderDesc($query->func()->count('employees.emp_no'))
            ->limit(3);
            
            
        $this->set(compact('mostWomen', 'leastWomen'));
    }
}
