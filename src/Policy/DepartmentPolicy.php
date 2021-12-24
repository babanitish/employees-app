<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Department;
use Authorization\IdentityInterface;

/**
 * Employee policy
 */
class DepartmentPolicy
{
    /**
     * Check if $user can add Employee
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Employee $employee
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Department $department)
    {
    }

    /**
     * Check if $user can edit Employee
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Employee $employee
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Department $department)
    {
        //déterminer si user est manager
        
        //si oui vérifier qu'il est du même départment
        //return $user->getOriginalData()->isManager && ($department->dept_no == $user->getOriginalData()->currentDepartment);
        return false;
    }

    /**
     * Check if $user can delete Employee
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Employee $employee
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Department $department)
    {
    }

    /**
     * Check if $user can view Employee
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Employee $employee
     * @return bool
     */
    public function canView(IdentityInterface $user, Department $department)
    {
    }
    

}
