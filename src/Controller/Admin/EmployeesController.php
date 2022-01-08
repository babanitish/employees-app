<?php

declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;
use App\Model\Entity\Employee;
use Cake\I18n\FrozenDate;

/**
 * Employees Controller
 *
 * @property \App\Model\Table\EmployeesTable $Employees
 * @method \App\Model\Entity\Employee[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmployeesController extends AppController
{
    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configurez l'action de connexion pour ne pas exiger d'authentification,
        // évitant ainsi le problème de la boucle de redirection infinie
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function home()
    {
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        //ajout de commentaire
        $employees = $this->paginate($this->Employees);
        $total = $this->Employees->find()->count();


        $this->set(compact('employees', 'total'));
    }

    /**
     * View method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Authorization->skipAuthorization();

        $this->Authorization->skipAuthorization();
        $employee = $this->Employees->get($id, [
            'contain' => ['Salaries'],
        ]);

        $this->set(compact('employee'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->skipAuthorization();

        $employee = $this->Employees->newEmptyEntity();
        // $dept_no = $this->request->getData('department');
        if ($this->request->is('post')) {

            //dernier id
            $query = $this->Employees->find('all', ['order' => ['emp_no' => 'DESC']])->limit(1)->first();
            //dd($query);
            $lastEmp_no = $query->emp_no + 1;
            $employee = $this->Employees->patchEntity($employee,  $this->request->getData());

            if ($this->Employees->save($employee)) {
                $employee = $this->Employees->get($lastEmp_no);
                $query = $this->Employees->Dept_emp->query();
                $result = $query->insert(['emp_no', 'dept_no', 'from_date', 'to_date'])
                    ->values([
                        'emp_no' => $lastEmp_no,
                        'dept_no' =>  $this->request->getData('department'),
                        'from_date' => date('Y-m-d'),
                        'to_date' => '9999-01-01',
                    ])
                    ->execute();

                if ($result) {
                    $this->Flash->success(__('The employee has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The employee could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('The employee could not be saved. Please, try again.'));
            }
        }
       // $departments = $this->getTableLocator()->get('departments')->find('list', ['keyfield' => 'id', 'valueField' => 'dept_name']);
     $this->set('departments', $this->departments->find('all')->combine('dept_no', 'dept_name'));
        $this->set(compact('employee'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employee = $this->Employees->get($id, [
            'contain' => ['Departments'],
        ]);



        $this->Authorization->authorize($employee, 'edit');


        if ($this->request->is(['patch', 'post', 'put'])) {
            $employee = $this->Employees->patchEntity($employee, $this->request->getData());
            if ($this->Employees->save($employee)) {
                $this->Flash->success(__('The employee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employee could not be saved. Please, try again.'));
        }
        $this->set(compact('employee'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employee id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employee = $this->Employees->get($id);
        if ($this->Employees->delete($employee)) {
            $this->Flash->success(__('The employee has been deleted.'));
        } else {
            $this->Flash->error(__('The employee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        $this->Authorization->skipAuthorization();

        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // indépendamment de POST ou GET, rediriger si l'utilisateur est connecté
        if ($result->isValid()) {
            // rediriger vers /articles après la connexion réussie
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'pages',
                'action' => 'home',
            ]);

            return $this->redirect($redirect);
        }
        // afficher une erreur si l'utilisateur a soumis un formulaire
        // et que l'authentification a échoué
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Votre identifiant ou votre mot de passe est incorrect.'));
        }
    }
    public function logout()
    {
        $this->Authorization->skipAuthorization();
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Employees', 'action' => 'login']);
        }
    }
}
