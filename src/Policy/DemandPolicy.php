<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Demand;
use Authorization\IdentityInterface;

/**
 * Demand policy
 */
class DemandPolicy
{
    /**
     * Check if $user can add Demand
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Demand $demand
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Demand $demand)
    {
    }

    /**
     * Check if $user can edit Demand
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Demand $demand
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Demand $demand)
    {
    }

    /**
     * Check if $user can delete Demand
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Demand $demand
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Demand $demand)
    {
    }

    /**
     * Check if $user can view Demand
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Demand $demand
     * @return bool
     */
    public function canView(IdentityInterface $user, Demand $demand)
    {
    }
}
