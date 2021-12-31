<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PartnersFixture
 */
class PartnersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'link' => 'Lorem ipsum dolor sit amet',
                'picture' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
