<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

use Cake\I18n\FrozenDate;
use Cake\Mailer\Mailer;
use Exception;

/**
 * Offers Controller
 *
 * @method \App\Model\Entity\Offer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OffersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $offers = $this->Offers->find('all', ['contain'=>['titles', 'departments']]);
        $offers = $this->paginate($offers);

        $this->set(compact('offers'));
    }

    /**
     * View method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();
        $offer = $this->Offers->get($id, [
            'contain' => ['departments', 'titles'],
        ]);

        $this->set(compact('offer'));
    }
    
    /**
     * View offers for a department
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function department($dept_no = null)
    {
        $this->Authorization->skipAuthorization();
        $offers = $this->Offers->find('all', ['contain'=>['titles', 'departments']])->where(['Offers.dept_no'=>$dept_no])->find('all');

        $offers = $this->paginate($offers);
        
        $this->set(compact('offers'));
        $this->set(compact('dept_no'));
        
    }
    
   

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();
        
        $offer = $this->Offers->newEmptyEntity();
        
        //treat form submission
        if ($this->request->is('post')) {
            //check department_no exists
            $dept_no = $this->request->getData()['dept_no'];
            $title_no = $this->request->getData()['title_no'];
            
            if (!$this->checkDeptTitleValidity($dept_no, $title_no)){
                $this->Flash->error(__('Departement ou title non trouvé'));
            }
           
            //save data into db
            $offer = $this->Offers->patchEntity($offer, $this->request->getData());
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The offer could not be saved. Please, try again.'));
            }
            
        }
        //get list of department and titles for dropdowns
        $this->set('departments', $this->Offers->departments->find('all')->combine('dept_no', 'dept_name'));
        $this->set('titles', $this->Offers->titles->find('all')->combine('title_no', 'name'));
        
        $this->set(compact('offer'));
        
    }
    
    private function checkDeptTitleValidity($dept_no, $title_no){
        $validDept = $this->getTableLocator()->get('Departments')
        ->find()
        ->where(['dept_no'=>$dept_no])
        ->count();
        
        //check title_no exists
        $validTitle = $this->getTableLocator()->get('Titles')
        ->find()
        ->where(['title_no'=>$title_no])
        ->count();
        
        return $validDept==1 && $validTitle==1;
    }

    /**
     * Edit method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        
        $offer = $this->Offers->get($id, [
            'contain' => [],
        ]);
        $this->Authorization->authorize($offer, 'edit');
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            //check department_no exists
            $dept_no = $this->request->getData()['dept_no'];
            $title_no = $this->request->getData()['title_no'];
            
            if (!$this->checkDeptTitleValidity($dept_no, $title_no)){
                $this->Flash->error(__('Departement ou title non trouvé'));
            }
            
            
            $offer = $this->Offers->patchEntity($offer, $this->request->getData());
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The offer could not be saved. Please, try again.'));
        }
        $this->set(compact('offer'));
        //get list of department and titles for dropdowns
        $this->set('departments', $this->Offers->departments->find('all')->combine('dept_no', 'dept_name'));
        $this->set('titles', $this->Offers->titles->find('all')->combine('title_no', 'name'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $offer = $this->Offers->get($id);
        
        $this->Authorization->authorize($offer, 'edit');
        
        if ($this->Offers->delete($offer)) {
            $this->Flash->success(__('The offer has been deleted.'));
        } else {
            $this->Flash->error(__('The offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
