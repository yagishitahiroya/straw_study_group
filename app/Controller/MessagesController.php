<?php

class MessagesController extends AppController {
    
    public function view($id = null){
        if (!$id) {
            throw new  NotFoundException(__('Invalid post'));
        }

        $thread = $this->Message->Thread->findById($id);

        $messages = $this->Message->find('all', ['conditions' => ['thread_id' => $id] ,'order' => ['Message.id' => 'asc']]);

        $newMessages = $id;
        $this->set(compact( 'thread','messages', 'newMessages'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Message->create();
            if ($this->Message->save($this->request->data)) {
                $this->Flash->success(__('投稿しました。'));
                //https://book.cakephp.org/1.3/ja/The-Manual/Developing-with-CakePHP/Controllers.html
                //$this->dataにデータが入っている(FormHelper のフォームからコントローラに送られた、POST データ)
                return $this->redirect(['action' => 'view', $this->data['Message']['thread_id']]);
            }
            $this->Flash->error(__('投稿に失敗しました。'));
        }
    }

    public function edit($id = null, $thread_id = null) {
        if (!$id) {
            throw new NotFoundException(__('無効な投稿です。'));
        }

        $message = $this->Message->findById($id);
        if (!$message) {
            throw new NotFoundException(__('無効な投稿です。'));
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Message->id = $id;
            if ($this->Message->save($this->request->data)) {
                $this->Flash->success(__('編集に成功しました。'));
                return $this->redirect(['action' => 'view', $thread_id]);
            }
            $this->Flash->error(__('編集に失敗しました。'));
        }
        if (!$this->request->data) {
            $this->request->data = $message;
        }
    }

    public function delete($id = null, $thread_id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        
        if ($this->Message->delete($id)) {
            $this->Flash->success(
                __('投稿を削除しました。 ')
            );
            
        } else {
            $this->Flash->error(
                __('投稿を削除できませんでした。')
            );
        }
        //$this->log($thread_id, LOG_DEBUG);
        //$threadId = $message->thread_id;
        //$message = $this->Message->get($id, ['contain' => ['thread_id']]);
        return $this->redirect(['action' => 'view', $thread_id]);
    }
}