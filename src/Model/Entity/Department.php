<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Department Entity
 *
 * @property string $dept_no
 * @property string $dept_name
 */
class Department extends Entity
{
    use \Cake\ORM\Locator\LocatorAwareTrait;
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'dept_name' => true,
        'description'=>true,
        'picture'=>true,
        'address'=>true,
        'roi'=>true
    ];
    
    
    
    protected function _getNbEmployees(){
        $query = $this->getTableLocator()->get('DeptEmp')->find()
                ->where(['dept_no'=>$this->dept_no, 'to_date'=>'9999-01-01']);
        
        return $query->count();
    }
    
    protected function _getManager(){
        $query = $this->getTableLocator()->get('DeptManager')->find('all', ['contain' => ['Employees']])->innerJoinWith('Employees')
        ->where(['dept_no'=>$this->dept_no, 'to_date'=>'9999-01-01']);
        
        return $query->first() ? $query->first()->employee : null;
    }
    
    /**
     * Retourne le salaire moyen des employés de ce département en excluant les managers
     */
    protected function _getAverageEmployeeSalary(){
        //trouver le manager
        $managerId = $this->manager->emp_no;
        //trouver les employes non manager
        $query = $this->getTableLocator()->get('DeptEmp')->find();
        $result = $query->select(['average' => $query->func()->avg('salary')])
            ->where(['DeptEmp.dept_no'=>$this->dept_no, 
                'DeptEmp.to_date'=>'9999-01-01', 
                'DeptEmp.emp_no IS NOT' => $managerId
            ])
            ->rightJoin(['Salaries'=>'salaries'], ['Salaries.emp_no=DeptEmp.emp_no','Salaries.from_date=DeptEmp.from_date' ]);
        return number_format($result->first()->average, 2);
        
    }
    
}
