<?php

class ThreadsController extends AppController {
    public $helpers = ['Html', 'Form'];

    public function threads() {
        $this->set('threads', $this->Thread->find('all'));
    }
    
    public function thread_add() {
        if ($this->request->is('post')) {
            $this->Thread->create();
            if ($this->Thread->save($this->request->data)) {
                $this->Flash->success(__('スレッドが保存されました'));
                return $this->redirect(['action' => 'message']);
            }
            $this->Flash->error(__('スレッドを追加できませんでした'));
        }
    }
}