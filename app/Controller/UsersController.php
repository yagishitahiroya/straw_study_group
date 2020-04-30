<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $layout = 'straw_user';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'login', 'logout');
    }


    public function add() {
        
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->flash_success(__('ユーザー登録に成功しました。'));
                unset($this->request->data['User']['password']);
                $this->Auth->login($this->request->data['User']);
                return $this->redirect(['controller' => 'threads', 'action' => 'threads']);
                //return $this->redirect(['action' => 'index']);
            }
            $this->Flash->flash_error(
                __('ユーザー登録に失敗しました')
            );
        }
    }

    public function login() {
        
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Flash->flash_success(__('ログインしました。'));
                $this->redirect($this->Auth->redirect());
                
            } else {
                $this->Flash->flash_error(__('ユーザー名またはパスワードが無効です。もう一度お試しください'));
            }
        }
    }
    
    public function logout() {
        $this->Flash->flash_success('ログアウトしました');
        $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user = null) {
        if (in_array($this->action, ['index'])) {
            return true;
        }
    }
}