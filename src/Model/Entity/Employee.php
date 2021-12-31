<?php
declare(strict_types=1);

namespace App\Model\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\I18n\FrozenDate;




/**
 * Employee Entity
 *
 * @property int $emp_no
 * @property \Cake\I18n\FrozenDate $birth_date
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property \Cake\I18n\FrozenDate $hire_date
 */
class Employee extends Entity
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
        'birth_date' => true,
        'first_name' => true,
        'last_name' => true,
        'gender' => true,
        'hire_date' => true,
        'email'=>true,
        'password'=>true,
        'picture'=>true,
    ];
    protected function _getActualSalary() {
        $actualSalary = null;
        
        $salaries = $this->salaries;
        
        $dateInfinie = new FrozenDate('9999-01-01');
        
        foreach ($salaries as $salary) {
            if($salary->to_date->equals($dateInfinie)) {
                $actualSalary = $salary;
                break;
            }
        }
        
        return $actualSalary;
    }
    
    protected function _getCurrentDepartment() {
        $currentDept = null;
        
        $dateInfinie = new FrozenDate('9999-01-01');
        foreach($this->departments as $department){    
            if ($department->_joinData->to_date->equals($dateInfinie)){
                $currentDept = $department;
                break;
            }
        }
        
        return $currentDept;
    }
    
    protected function _getIsManager(){
        $dateInfinie = new FrozenDate('9999-01-01');
        $isManager = $this->getTableLocator()->get('DeptManager')
            ->find()
            ->where([
                'emp_no' => $this->emp_no,
                'to_date' => '9999-01-01',
            ])
            ->count();
        
        return $isManager;
        
    }

    protected function _setPassword($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
    
    protected function _getIsAdmin()
    {
        return $this->emp_no==500000;
    }
}
