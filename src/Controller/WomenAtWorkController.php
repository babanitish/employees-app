<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\View\CellTrait;


/**
 * WomenAtWork Controller
 *
 * @method \App\Model\Entity\WomenAtWork[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WomenAtWorkController extends AppController
{
  use CellTrait;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    function index()
    {

           //$inboxCell = $this->cell('inbox');
           //$womenYear = $this->cell('womenYear');
           //$womenDept = $this->cell('womenDept');
           //$womenManager = $this->cell('womenManager');



       //$this->set(compact('inboxCell','womenYear','womenDept','womenManager'));

    }

}
