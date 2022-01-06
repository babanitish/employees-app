<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\DeptEmp;
use Authorization\IdentityInterface;

/**
 * DeptEmp policy
 */
class DeptEmpPolicy
{
    /**
     * Check if $user can add DeptEmp
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptEmp $deptEmp
     * @return bool
     */
    public function canAdd(IdentityInterface $user, DeptEmp $deptEmp)
    {
    }

    /**
     * Check if $user can edit DeptEmp
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptEmp $deptEmp
     * @return bool
     */
    public function canEdit(IdentityInterface $user, DeptEmp $deptEmp)
    {
        return ( $user->email == 'lauren.swart@gmail.com');
    }

    /**
     * Check if $user can delete DeptEmp
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptEmp $deptEmp
     * @return bool
     */
    public function canDelete(IdentityInterface $user, DeptEmp $deptEmp)
    {
    }

    /**
     * Check if $user can view DeptEmp
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptEmp $deptEmp
     * @return bool
     */
    public function canView(IdentityInterface $user, DeptEmp $deptEmp)
    {
    }
    
    /**
     * Check if $user can manage employees of a department
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptManager $deptEmp
     * @return bool
     */
    public function canDepartment(IdentityInterface $user,  DeptEmp $deptEmp)
    {
        return true;
    }
}
