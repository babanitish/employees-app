<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Offer;
use Authorization\IdentityInterface;

/**
 * Offer policy
 */
class OfferPolicy
{
    /**
     * Check if $user can add Offer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Offer $offer
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Offer $offer)
    {
    }

    /**
     * Check if $user can edit Offer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Offer $offer
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Offer $offer)
    {
        return $user->email == 'lauren.swart@gmail.com';
    }

    /**
     * Check if $user can delete Offer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Offer $offer
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Offer $offer)
    {
        return $user->email == 'lauren.swart@gmail.com';
    }

    /**
     * Check if $user can view Offer
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Offer $offer
     * @return bool
     */
    public function canView(IdentityInterface $user, Offer $offer)
    {
    }
}
