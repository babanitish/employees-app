<?php

declare(strict_types=1);

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Inbox cell
 */
class WomenYearCell extends Cell
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
        $arrayWomen = [];
        $arrayYear = [];

        $query = $this->getTableLocator()->get('employees')->find();

        $query->select([
            'nbWomen' => $query->func()->count('employees.emp_no'), 'hire_date'
        ])
            ->where([
                'gender' => 'F',
            ])
            ->group([
                'hire_date'
            ]);
        $result = $query->all();

        foreach ($result as $employee) {
            if (!in_array($employee->hire_date->format('Y'), $arrayYear)) {
                $arrayWomen[] = $employee->nbWomen;
                $arrayYear [] = $employee->hire_date->format('Y');
            }
        }
        $this->set(compact('arrayWomen','arrayYear'));
    }
}
