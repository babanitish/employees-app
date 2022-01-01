<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

use Cake\View\ViewBuilder;

/**
 * Departments Controller
 *
 * @property \App\Model\Table\DepartmentsTable $Departments
 * @method \App\Model\Entity\Department[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DepartmentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        //tout le monde peut voir cette page
        $this->Authorization->skipAuthorization();
        
        $departments = $this->Departments->find('all', [
            'contain'=>'Offers'
        ]);
        
        $departments = $this->paginate($departments);

        $this->set(compact('departments'));
    }

    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $department = $this->Departments->get($id, [
            'contain' => ['Managers', 'Offers'],
        ]);
        $this->set(compact('department'));
    }
}
