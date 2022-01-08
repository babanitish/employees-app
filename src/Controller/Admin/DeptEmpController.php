<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\FrozenDate;

/**
 * DeptManager Controller
 *
 * @property \App\Model\Table\DeptManagerTable $DeptManager
 * @method \App\Model\Entity\DeptManager[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeptEmpController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $deptEmp = $this->paginate($this->DeptEmp);

        $this->set(compact('deptEmp'));
    }

    /**
     * View method
     *
     * @param string|null $id Dept Employee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deptEmp = $this->DeptEmp->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('deptEmp'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function department($id = null)
    {
        $dept_no = $id;
        $this->Authorization->skipAuthorization();
        
        $deptEmployees = $this->DeptManager->find('all',[
            'contain' => ['Employees', 'Departments']
        ]);
        $deptEmployees =  $deptEmployees->where( ['deptEmp.dept_no'=>$dept_no])->all();
        $this->set(compact('deptEmployees'));
        $this->set(compact('dept_no'));
    }
    
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deptEmp = $this->DeptEmp->newEmptyEntity();
        if ($this->request->is('post')) {
            $deptEmp = $this->DeptEmp->patchEntity($deptEmp, $this->request->getData());
            if ($this->DeptEmp->save($deptEmp)) {
                $this->Flash->success(__('The dept employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dept employee could not be saved. Please, try again.'));
        }
        $this->set(compact('deptEmp'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Dept Manager id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deptEmp = $this->DeptEmp->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deptEmp = $this->DeptEmp->patchEntity($deptEmp, $this->request->getData());
            if ($this->DeptEmp->save($deptEmp)) {
                $this->Flash->success(__('The dept employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The dept employee could not be saved. Please, try again.'));
        }
        $this->set(compact('deptEmp'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Dept Manager id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deptEmp = $this->DeptEmp->get($id);
        if ($this->DeptEmp->delete($deptEmp)) {
            $this->Flash->success(__('The dept employee has been deleted.'));
        } else {
            $this->Flash->error(__('The dept employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    

}
