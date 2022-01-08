<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\WomenAtWorkController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\WomenAtWorkController Test Case
 *
 * @uses \App\Controller\WomenAtWorkController
 */
class WomenAtWorkControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.WomenAtWork',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\WomenAtWorkController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\WomenAtWorkController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\WomenAtWorkController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\WomenAtWorkController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\WomenAtWorkController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
