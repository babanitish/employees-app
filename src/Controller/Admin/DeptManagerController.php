<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\FrozenDate;
use Cake\ORM\Query;
use Cake\ORM\Locator\LocatorAwareTrait;
use function PHPUnit\Framework\isNan;
/**
 * DeptManager Controller
 *
 * @property \App\Model\Table\DeptManagerTable $DeptManager
 * @method \App\Model\Entity\DeptManager[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeptManagerController extends AppController
{

    
    /**
     * View managers of a department
     *
     * @param string|null $id Department id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function department($id = null)
    {
        $dept_no = $id;
        
        $this->Authorization->skipAuthorization();
        
        $deptManagers = $this->DeptManager->find('all',[
            'contain' => ['Employees', 'Departments']
        ]);
        $deptManagers =  $deptManagers->where( ['deptManager.dept_no'=>$dept_no])
                ->order(['from_date' => 'ASC'])->all();
        $this->set(compact('deptManagers'));
        $this->set(compact('dept_no'));
    }
    
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($dept_no = null)
    {
        $deptManager = $this->DeptManager->newEmptyEntity();
        $this->Authorization->authorize($deptManager, 'add');
        
        //redirigier si aucun département id
        if(empty($dept_no)) return $this->redirect(['controller'=>'departments','action' => 'index']);
        
        $this->set(compact('dept_no'));
        
        //vérfier s'il n'y a pas dejà un manager
        if (0<$this->DeptManager->find()->where(['dept_no'=>$dept_no, 'to_date'=>'9999-01-01'])->count()){
            $this->Flash->error(__('Ce département a déjà un manager'));
            return $this->redirect(['action' => 'department', $dept_no]);
        }
        
        
        //traiter le formulaire d'ajout
        if ($this->request->is('post')) {
            //valeurs par défaut
            $deptManager->from_date = new FrozenDate();
            $deptManager->to_date = new FrozenDate('9999-01-01');
            //dd($this->request->getData());
            $emp_no = $this->request->getData()['emp_no'] ?? null;
            
            //vérifier qu'on a bien reçu un employee id et que c'est un nombre
            if(empty($emp_no) || !intval($emp_no)) {
                $this->Flash->error(__('Incorrect employee number'));
                $this->set(compact('deptManager'));
                return;
            }
            //transofmer en entier
            $emp_no = intval($emp_no);
            
            //récupérer les valeurs du formulaire
            $deptManager->emp_no = $emp_no;
            $deptManager->dept_no = $dept_no;
            
            //dd($deptManager);
            //check si l'employé existe et s'il travaille dans ce département
            $validEmployees = $this->getTableLocator()->get('DeptEmp')
                ->find()
                ->where(['emp_no'=>$emp_no, 'dept_no'=>$dept_no, 'to_date'=>'9999-01-01'])
                ->count();
            
            if ($validEmployees!=1){
                $this->Flash->error(__('Employé non trouvé.'));
            } else if ($this->DeptManager->save($deptManager)) {
                $this->Flash->success(__('The dept manager has been saved.'));
                return $this->redirect(['action' => 'department', $dept_no]);
            } else {
                $this->Flash->error(__('The dept manager could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('deptManager'));
    }

    
    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function revoke($id = null)
    {
        
        
        //verifier si on a cet employé comme manager actuel
        $deptManager = $this->DeptManager->find()
            ->where( ['deptManager.emp_no'=>$id, 'to_date'=>'9999-01-01'])
            ->first();
        
        if(empty($deptManager)){
            $this->Flash->error(__('The manager could not be revoked. Please, try again.'));
            return $this->redirect(['action' => 'department', $deptManager->dept_no]);
        }
        
        $this->Authorization->authorize($deptManager, 'revoke');
        
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            //mettre la date de fin du manager  à aujourdhui
            $deptManager->to_date = new FrozenDate();
            if ($this->DeptManager->save($deptManager)) {
                $this->Flash->success(__('The manager has been revoked.'));
                
                return $this->redirect(['action' => 'department', $deptManager->dept_no]);
            }
            $this->Flash->error(__('The manager could not be revoked. Please, try again.'));
        }
        return $this->redirect(['action' => 'department', $deptManager->dept_no]);
    }
}
