<?php

class ThreadsController extends AppController {
    public $helpers = ['Html', 'Form'];

    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Thread.id' => 'asc'
        )
    );

    public function threads() {
        //$threads = $this->Thread->find('all');
        //$this->set(compact('threads'));

        $this->set('threads', $this->paginate());

    }
    
    public function add() {
        if ($this->request->is('post')) {
            $this->Thread->create();
            $this->Thread->user_id = $this->Auth->user('id');
            $thread = $this->request->data;
            //$this->log($thread, LOG_DEBUG);
            $thread['Thread']['user_id'] = $this->Auth->user('id');
            if ($this->Thread->save($thread)) {
                $this->Flash->flash_success(__('スレッドが保存されました'));
                return $this->redirect(['action' => 'threads']);
            }
            $this->Flash->flash_error(__('スレッドを追加できませんでした'));
        }
    }

    public function edit($id = null, $user_id = null) {
        if (!$id) {
            throw new NotFoundException(__('無効なスレッドです'));
        }
    
        $thread = $this->Thread->findById($id);
        if (!$thread) {
            throw new NotFoundException(__('無効なスレッドです'));
        }
        
        if ($user_id !== $this->Auth->user('id')) {
            $this->Flash->error(
                __('他のユーザーの投稿は削除できません')
            );
            return $this->redirect(['action' => 'threads']);
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Thread->id = $id;

            if ($this->Thread->save($this->request->data)) {
                $this->Flash->flash_success(__('編集に成功しました!'));
                return $this->redirect(array('action' => 'threads'));
            }
            $this->Flash->flash_error(__('編集に失敗しました'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $thread;
        }
    }

    public function delete($id = null , $user_id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($user_id !== $this->Auth->user('id')) {
            $this->Flash->flash_error(
                __('他のユーザーの投稿は削除できません')
            );
            return $this->redirect(['action' => 'threads']);
        }

        if ($this->Thread->delete($id)) {
            $this->Flash->flash_success(
                __('スレッドの削除に成功しました。')
            );
        } else {
            $this->Flash->flash_error(
                __('スレッドの削除に失敗しました。')
            );
        }
    
        return $this->redirect(array('action' => 'threads'));
    }
    
    public function isAuthorized($user = null)
    {
        if (in_array($this->action, [
            'add',
            'edit',
            'threads',
            'index'])) {
                return true;
        }
        return parent::isAuthorized($user);
    }
}