<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    // public function initialize()
    // {
    //     parent::initialize();

    //     $this->loadComponent('RequestHandler');
    //     $this->loadComponent('Flash');
    // }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    // Added by Wasim for session authentication
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Cookie');
        $this->Cookie->configKey('userLogin', 'encryption', false);
        if(isset($this->request->prefix) && ($this->request->prefix == 'admin'))
        {            
            $this->loadComponent('Auth', [
                'authorize' => 'Controller',  

                'loginRedirect' => [
                'controller' => 'Bookmarks',
                'action' => 'index',
                'prefix' => 'admin',
                // 'prefix' => false,
                ],

                'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'prefix' => false,
                    
                ],

                'authenticate' => [
                    'Form' => [
                        'fields' => ['username' => 'username', 'password' => 'password'],
                        'finder' => 'userRole'
                    ]

                ],
                
            ]);
        }
        else{  
            $this->loadComponent('Auth', [
                // 'authorize' => 'Controller',
                'authenticate' => [
                    'Form' => [
                        'fields' => ['username' => 'username', 'password' => 'password'],
                        'finder' => 'verifyAuth'
                    ]
                ],
                'loginRedirect' => [                
                    'controller' => 'Bookmarks',
                    'action' => 'index',
                    'prefix' => false,
                ],
                'logoutRedirect' => [
                    'controller' => 'Users',
                    'action' => 'login',
                    'prefix' => false,
                ]
                
            ]);

            $this->CookieExist();
        }
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['index', 'view']);
        if($this->request->prefix == 'admin')
        {
            $this->Auth->deny();
        }
        else
        {
            $this->Auth->allow(['index','view']);
        }
        // if($this->Auth->request->params['prefix'] == 'admin')
        // {
        //     $this->Auth->allow(['index', 'view', 'edit', 'add', 'delete', 'logout']);
        // }
    }

 
    public function isAuthorized($user)
    {
        // Admin can access every action        
        // if($this->request->session()->read('Auth.Users.role') == 'admin') {            
        //     return true;
        // }        
        // return false;

        if (isset($this->request->params['prefix']) && $this->request->params['prefix'] === 'admin') {

            if($user['role'] != 'admin'){
                $this->Flash->error("Unauthorized access");     
                $this->redirect(array('controller' => 'Users','action' => 'index', 'prefix' => false));
                return false;
            }            //return true;

        }

        if(isset($user) && $user['role'] != 'admin')
        {
            return false;
        }
        
        return true;
    }

    public function CookieExist()
    {
        if ($this->Cookie->check('userLogin')) {
            // pr($this->Cookie->read('userLogin'));
            // $user = TableRegistry::get('Users');
            // pr($user->findByUsername($this->Cookie->read('userLogin.username'))->select(['username','id'])->first());
            $this->Auth->setUser($this->Cookie->read('userLogin'));
        }
    }
}
