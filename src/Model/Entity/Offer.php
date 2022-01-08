<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Offer Entity
 *
 * @property int $offer_no
 * @property string $dept_no
 * @property int $title_no
 * @property string $description
 */
class Offer extends Entity
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
        'dept_no' => true,
        'title_no' => true,
        'description' => true,
    ];

    
    /**
     * Get the title name of a job offer
     * 
     * @return String The title name
     */
    protected function _getTitleName(){
        $query = $this->getTableLocator()->get('Titles')->find()
        ->where(['title_no'=>$this->title_no]);
        return $query->first()->name;
    }

}
