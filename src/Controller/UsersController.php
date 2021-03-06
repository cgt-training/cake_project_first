<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        
        // Set the layout
        // $this->layout = 'frontend';
        $this->viewBuilder()->layout('frontend_user');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // pr($this->request->session()->read('Auth.User'));
        if($this->isAuthorized($this->request->session()->read('Auth.User')))
        {
            $user = $this->Users->newEntity();
            // echo $this->Cookie->read('userLogin.username');
            // echo $this->Cookie->read('userLogin.userId');
            if ($this->request->is('post')) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }
            $this->set('cookieData',$this->Cookie->read('userLogin'));
            $this->set(compact('user'));
            $this->set('_serialize', ['user']);
        }
        else
        {
            $this->Flash->error(__('UnAuthorized Access'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->isAuthorized($this->request->session()->read('Auth.User')))
        {
            $user = $this->Users->get($id, [
                'contain' => []
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }
            }
            $this->set(compact('user'));
            $this->set('_serialize', ['user']);
        }
        else
        {
            $this->Flash->error(__('UnAuthorized Access'));
            return $this->redirect($this->referer());
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /** Added By Wasim for Session authentication **/
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['view', 'logout']);
    }
    
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();            
            if ($user) {
                if($this->request->data['rememberMe']){
                    $this->Cookie->write('userLogin',['userId' => $user['id'], 'username' => $user['username'], 'role' => $user['role']]);
                }
                $this->Auth->setUser($user);                
                $this->Flash->success(__('Login Successful'));
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->warning(__('Invalid username or password, try again'));
        }
    }

    public function logout()
    {
        $this->Flash->success(__('Logout successful'));        
        if($this->Cookie->check('userLogin'))
        {
            $this->Cookie->delete('userLogin');
        }
        return $this->redirect($this->Auth->logout());
    }

}
