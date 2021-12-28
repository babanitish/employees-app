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

        $query->select([
            'depName' => 'departments.dept_name',
            'nbWomenDept' => $query->func()->count('employees.emp_no')
        ])
            ->innerJoinWith('departments')
            ->where([
                'gender' => 'F',
            ])
            ->group([
                'departments.dept_no'
            ])

            ->orderAsc($query->func()->count('employees.emp_no'));
        $result = $query->all();
        $cpt = 0;
        foreach ($result as $dept) {
            $cpt++;
            if ($cpt < 4) {
                $deptNameMoreWo[] = $dept->depName;
                $nbWomenDept[] = $dept->nbWomenDept;
            }
            if ($cpt > 6) {
                $deptNameLessWo[] = $dept->depName;
                $nbDeptLessWo[] = $dept->nbWomenDept;
            }
        }
        $this->set(compact('deptNameMoreWo', 'nbWomenDept','deptNameLessWo','nbDeptLessWo'));
    }
}
