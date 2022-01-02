<?php
declare(strict_types=1);

namespace App\Controller\Admin;

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

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $department = $this->Departments->newEmptyEntity();
        
        //tout le monde peut add
        $this->Authorization->authorize($department, 'add');
        
        if ($this->request->is('post')) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            $department->picture = '';
            $department->roi = '';
            //get uploaded picture
            if (!empty($this->request->getData('uploadedPic'))){
                $fileObject = $this->request->getData('uploadedPic');
                $fileName = $fileObject->getClientFilename();
                if (!empty($fileName)){
                    if ($fileObject->getClientMediaType()=="image/jpeg" && $fileObject->getSize()<500000){
                        //save document
                        $fileName = $department->dept_no.'.jpg';
                        $destination = 'img/departments/' .$fileName ;
                        $fileObject->moveTo($destination);
                        $department->picture = $fileName;
                    } else {
                        $this->Flash->error(__('The department could not be saved. Invalid Picture'));
                        $this->set(compact('department'));
                        return;
                    }
                }
            }
            //get uploaded roi pdf
            if (!empty($this->request->getData('uploadedROI'))){
                $fileObject = $this->request->getData('uploadedROI');
                $fileName = $fileObject->getClientFilename();
                if (!empty($fileName)){
                    if ($fileObject->getClientMediaType()=="application/pdf" && $fileObject->getSize()<500000){
                        //save document
                        $fileName = $department->dept_no.'.pdf';
                        $destination = 'docs/ROI/' .$fileName ;
                        $fileObject->moveTo($destination);
                        $department->roi = $fileName;
                    } else {
                        $this->Flash->error(__('The department could not be saved. Invalid ROI'));
                        $this->set(compact('department'));
                        return;
                    }
                }
            }
            
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The department has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department could not be saved. Please, try again.'));
        }
        $this->set(compact('department'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $department = $this->Departments->get($id, [
            'contain' => [],
        ]);
        
        //le manager de ce département peut edit
        $this->Authorization->authorize($department, 'edit');
        
        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $department = $this->Departments->patchEntity($department, $this->request->getData());
            
            //get uploaded picture
            if (!empty($this->request->getData('uploadedPic'))){
                $fileObject = $this->request->getData('uploadedPic');
                $fileName = $fileObject->getClientFilename();
                if (!empty($fileName)){
                    if ($fileObject->getClientMediaType()=="image/jpeg" && $fileObject->getSize()<500000){
                        //save document
                        $fileName = $department->dept_no.'.jpg';
                        $destination = 'img/departments/' .$fileName ;
                        $fileObject->moveTo($destination);
                        $department->picture = $fileName;
                    } else {
                        $this->Flash->error(__('The department could not be saved. Invalid Picture'));
                        $this->set(compact('department'));
                        return;
                    }
                }
            }
            //get uploaded roi pdf
            if (!empty($this->request->getData('uploadedROI'))){
                $fileObject = $this->request->getData('uploadedROI');
                $fileName = $fileObject->getClientFilename();
                if (!empty($fileName)){
                    if ($fileObject->getClientMediaType()=="application/pdf" && $fileObject->getSize()<500000){
                        //save document
                        $fileName = $department->dept_no.'.pdf';
                        $destination = 'docs/ROI/' .$fileName ;
                        $fileObject->moveTo($destination);
                        $department->roi = $fileName;
                    } else {
                        $this->Flash->error(__('The department could not be saved. Invalid ROI'));
                        $this->set(compact('department'));
                        return;
                    }
                }
            }
            
            if ($this->Departments->save($department)) {
                $this->Flash->success(__('The department has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The department could not be saved. Please, try again.'));
        }
        $this->set(compact('department'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $department = $this->Departments->get($id);
        
        $this->Authorization->authorize($department, 'delete');
        
        if($department->nbEmployees>0){
            $this->Flash->error(__('The department could not be deleted as it currently has employees.'));
        } else if ($this->Departments->delete($department)) {
            $this->Flash->success(__('The department has been deleted.'));
        } else {
            $this->Flash->error(__('The department could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
