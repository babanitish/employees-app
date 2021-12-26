<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\FrozenDate;
use Cake\Mailer\Mailer;

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
            
            /*
            $managerEmail = 'lauren.swart@gmail.com';
            //todo cv
            
            //create email
            $mailer = new Mailer('default');
            $mailer->setFrom([$email => "$firstname $lastname"])
            ->setTo($managerEmail)
            ->setSubject('Job application')
            ->deliver("$firstname $lastname, born on $birthdate, is applying for ".$offer->title->name.".");
            /*
            $mailer->setAttachments([
                'photo.png' => [
                    'file' => '/full/some_hash.png',
                    'mimetype' => 'image/png',
                    'contentId' => 'my-unique-id'
                ]
            ]);
            */
            
            //send
            //display message success or failure
            $sentEmail = true;
            if ($sentEmail) {
                $this->Flash->success(__('Your application has been sent'));
                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Your application could not be sent. Please, try again.'));
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
