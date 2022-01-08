<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\DeptManager;
use Authorization\IdentityInterface;

/**
 * DeptManager policy
 */
class DeptManagerPolicy
{
    /**
     * Check if $user can add DeptManager
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptManager $deptManager
     * @return bool
     */
    public function canAdd(IdentityInterface $user, DeptManager $deptManager)
    {
        return true;
    }

    /**
     * Check if $user can edit DeptManager
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptManager $deptManager
     * @return bool
     */
    public function canEdit(IdentityInterface $user, DeptManager $deptManager)
    {
    }

    /**
     * Check if $user can delete DeptManager
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptManager $deptManager
     * @return bool
     */
    public function canDelete(IdentityInterface $user, DeptManager $deptManager)
    {
    }

    /**
     * Check if $user can view DeptManager
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptManager $deptManager
     * @return bool
     */
    public function canView(IdentityInterface $user, DeptManager $deptManager)
    {
    }
    
    /**
     * Check if $user can manage Managers of a department
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptManager $deptManager
     * @return bool
     */
    public function canDepartment(IdentityInterface $user,  DeptManager $deptManager)
    {
        return true;
    }
    
    /**
     * Check if $user can revoke the Manager of a department
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\DeptManager $deptManager
     * @return bool
     */
    public function canRevoke(IdentityInterface $user,  DeptManager $deptManager)
    {
        return true;
    }
    
}
