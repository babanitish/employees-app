<?php
declare(strict_types=1);

namespace App\Controller;

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
            'contain' => [],
        ]);

        $this->set(compact('offer'));
    }
    
    /**
     * Apply method
     *
     * @param string|null $id Offer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function apply($id = null)
    {
        $this->Authorization->skipAuthorization();
        $offer = $this->Offers->get($id, [
            'contain' => ['titles', 'departments'],
        ]);
        
        
        if ($this->request->is([ 'post'])) {
            //retrieve info from connected user
            $user = $this->Authentication->getIdentity()->getOriginalData();
            $firstname = $user->first_name;
            $lastname = $user->last_name;
            $email = $user->email;
            $birthdate = new FrozenDate($user->birth_date);
            
            
            $managerEmail = 'lauren.swart@gmail.com';
            
            $fileobject = $this->request->getData('uploadedCV');
            $destination = 'docs/applications/'.$offer->offer_no.'-'.$user->emp_no.'.pdf';
            
            // Existing files with the same name will be replaced.
            $fileobject->moveTo($destination);

            
            try {
                //create email
                $mailer = new Mailer('default');
                $mailer->setFrom([$email => "$firstname $lastname"])
                ->setTo($managerEmail)
                ->setSubject('Job application')
                ->deliver("$firstname $lastname, born on $birthdate, is applying for ".$offer->title->name.".");
                //attach cv
                /*
                $mailer->setAttachments([
                    'cv' => [
                        'file' => $destination,
                        'mimetype' => 'application/pdf'
                    ]
                ]);
                */
                //send email
                $mailer->deliver();
                //display message success or failure
                $sentEmail = false;
                
                if ($sentEmail) {
                    $this->Flash->success(__('Your application has been sent'));
                    
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('Your application could not be sent. Please, try again.'));
                }
                
            } catch (Exception $e) {
                $this->Flash->error(__('Exception : Your application could not be sent. Please, try again.'));
                $this->set(compact('offer'));
                return;
            }
            
            
        }
        
        
        $this->set(compact('offer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $offer = $this->Offers->newEmptyEntity();
        if ($this->request->is('post')) {
            $offer = $this->Offers->patchEntity($offer, $this->request->getData());
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offer could not be saved. Please, try again.'));
        }
        $this->set(compact('offer'));
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
        if ($this->request->is(['patch', 'post', 'put'])) {
            $offer = $this->Offers->patchEntity($offer, $this->request->getData());
            if ($this->Offers->save($offer)) {
                $this->Flash->success(__('The offer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The offer could not be saved. Please, try again.'));
        }
        $this->set(compact('offer'));
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
        if ($this->Offers->delete($offer)) {
            $this->Flash->success(__('The offer has been deleted.'));
        } else {
            $this->Flash->error(__('The offer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
