<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Partners Controller
 *
 * @property \App\Model\Table\PartnersTable $Partners
 * @method \App\Model\Entity\Partner[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PartnersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();

        $partners = $this->paginate($this->Partners);
        
        $this->set(compact('partners'));
    }
    
    /**
     * View method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $partner = $this->Partners->get($id, [
            'contain' => [],
        ]);
        
        $this->set(compact('partner'));
    }
    
    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $partner = $this->Partners->newEmptyEntity();
        if ($this->request->is('post')) {
            $partner = $this->Partners->patchEntity($partner, $this->request->getData());
            if ($this->Partners->save($partner)) {
                $this->Flash->success(__('The partner has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner could not be saved. Please, try again.'));
        }
        $this->set(compact('partner'));
    }
    
    /**
     * Edit method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $partner = $this->Partners->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $partner = $this->Partners->patchEntity($partner, $this->request->getData());
            if ($this->Partners->save($partner)) {
                $this->Flash->success(__('The partner has been saved.'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The partner could not be saved. Please, try again.'));
        }
        $this->set(compact('partner'));
    }
    
    /**
     * Delete method
     *
     * @param string|null $id Partner id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $partner = $this->Partners->get($id);
        if ($this->Partners->delete($partner)) {
            $this->Flash->success(__('The partner has been deleted.'));
        } else {
            $this->Flash->error(__('The partner could not be deleted. Please, try again.'));
        }
        
        return $this->redirect(['action' => 'index']);
    }
}
