<?php

class ThoughtsController extends AppController {
    
    public function index(){
        $reports = $this->Report->find('all');

    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Report->create();
            $this->Report->user_id = $this->Auth->user('id');
            $report = $this->request->data;
            //$this->log($thread, LOG_DEBUG);
            $report['Report']['user_id'] = $this->Auth->user('id');
            if ($this->Report->save($report)) {
                $this->Flash->flash_success(__('スレッドが保存されました'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->flash_error(__('スレッドを追加できませんでした'));
        }
    }

    public function edit($id = null, $user_id = null) {
        if (!$id) {
            throw new NotFoundException(__('無効なスレッドです'));
        }
    
        $report= $this->Report->findById($id);
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
            'index'])) {
                return true;
        }
        return parent::isAuthorized($user);
    }
}