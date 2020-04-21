<?php

class ThreadsController extends AppController {
    public $helpers = ['Html', 'Form'];

    public function threads() {
        $this->set('threads', $this->Thread->find('all'));
    }
    
    public function add() {
        if ($this->request->is('post')) {
            $this->Thread->create();
            if ($this->Thread->save($this->request->data)) {
                $this->Flash->success(__('スレッドが保存されました'));
                return $this->redirect(['action' => 'threads']);
            }
            $this->Flash->error(__('スレッドを追加できませんでした'));
        }
    }

    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('無効なスレッドです'));
        }
    
        $thread = $this->Thread->findById($id);
        if (!$thread) {
            throw new NotFoundException(__('無効なスレッドです'));
        }
    
        if ($this->request->is(array('post', 'put'))) {
            $this->Thread->id = $id;
            if ($this->Thread->save($this->request->data)) {
                $this->Flash->success(__('編集に成功しました!'));
                return $this->redirect(array('action' => 'threads'));
            }
            $this->Flash->error(__('編集に失敗しました'));
        }
    
        if (!$this->request->data) {
            $this->request->data = $thread;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
    
        if ($this->Thread->delete($id)) {
            $this->Flash->success(
                __('スレッドの削除に成功しました。')
            );
        } else {
            $this->Flash->error(
                __('スレッドの削除に失敗しました。')
            );
        }
    
        return $this->redirect(array('action' => 'threads'));
    }  
}