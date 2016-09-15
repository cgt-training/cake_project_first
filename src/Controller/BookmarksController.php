<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bookmarks Controller
 *
 * @property \App\Model\Table\BookmarksTable $Bookmarks
 */
class BookmarksController extends AppController
{

    // public $components = ['Paginator'];
    // public $paginate = [
    //     'limit' => 25,
    //     'order' => [
    //         'Articles.title' => 'asc'
    //     ]
    // ];
    public $user = null;

    public function initialize()
    {
        parent::initialize();
        
        // Set the layout
        // $this->layout = 'frontend';

        $this->user= $this->Auth->user('id');

        $this->viewBuilder()->layout('frontend_bookmark');
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'fields' => ['Bookmarks.id', 'Users.id', 'Bookmarks.twit','Bookmarks.created', 'Bookmarks.updated'],
            'contain' => ['Users'],//association
            'order' => [
                  'twit' => 'asc'
             ],            
            'limit' => 2,
            
        ];
        $bookmarks = $this->paginate($this->Bookmarks);

        $this->set(compact('bookmarks'));
        $this->set('_serialize', ['bookmarks']);
    }

    /**
     * View method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bookmark = $this->Bookmarks->get($id, [
            'contain' => ['Users', 'Tags']
        ]);

        $this->set('bookmark', $bookmark);
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bookmark = $this->Bookmarks->newEntity();
        if ($this->request->is('post')) {
            $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
            if ($this->Bookmarks->save($bookmark)) {
                $this->Flash->success(__('The bookmark has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
            }
        }
        $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
        $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200]);
        $this->set(compact('bookmark', 'users', 'tags'));
        $this->set('_serialize', ['bookmark']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        if($this->isAuthorized($this->user,$this->request->session()->read('Auth.User.username')))
        { 
            $bookmark = $this->Bookmarks->get($id, [
                'contain' => ['Tags']
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $bookmark = $this->Bookmarks->patchEntity($bookmark, $this->request->data);
                if ($this->Bookmarks->save($bookmark)) {
                    $this->Flash->success(__('The bookmark has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The bookmark could not be saved. Please, try again.'));
                }
            }
            $users = $this->Bookmarks->Users->find('list', ['limit' => 200]);
            $tags = $this->Bookmarks->Tags->find('list', ['limit' => 200]);
            $this->set(compact('bookmark', 'users', 'tags'));
            $this->set('_serialize', ['bookmark']);
        }
        else{
            $this->Flash->error(_('Unauthorized user'));
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Bookmark id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if($this->isAuthorized($this->user,$this->request->session()->read('Auth.User.username')))
        {
            $this->Flash->success(__('authorized'));
            $this->request->allowMethod(['post', 'delete']);
            $bookmark = $this->Bookmarks->get($id);
            if ($this->Bookmarks->delete($bookmark)) {
                $this->Flash->success(__('The bookmark has been deleted.'));
            } else {
                $this->Flash->error(__('The bookmark could not be deleted. Please, try again.'));
            }

            return $this->redirect(['action' => 'index']);
        }
        else{
            $this->Flash->error(_('Unauthorized user'));
            return $this->redirect(['action' => 'index']);
        }
    }

    /**
    *test fucntion
    **/
    public function testWasim()
    {
        $bookmark = $this->Bookmarks->testWasim();
// pr($bookmark->toArray());exit();
        $this->set('color', 'pink');
        $this->set(compact('bookmark'));
        $this->set('_serialize', ['bookmark']);
    }

    public function isAuthorized($user,$username)
    {
        // All registered users can add articles
        if ($this->request->action === 'add') {
            return true;
        }

        // The owner of an article can edit and delete it
        if (in_array($this->request->action, ['edit', 'delete'])) {
            $bookmarkId = (int)$this->request->params['pass'][0];            
            if ($this->Bookmarks->isOwnedBy($bookmarkId, $this->user)) {
                return true;
            }
        }

        return parent::isAuthorized($user,$username);
    }                   
}
