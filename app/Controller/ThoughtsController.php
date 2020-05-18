<?php

class ThoughtsController extends AppController 
{
    
    public function view($id = null)
    {
        if (!$id) {
            throw new  NotFoundException(__('Invalid post'));
        }

        $document = $this->Thought->Document->findById($id);

        $thoughts = $this->Thought->find('all', ['conditions' => ['document_id' => $id] ,'order' => ['Thought.id' => 'asc']]);

        $newThoughts = $id;
        $this->set(compact( 'document','thoughts', 'newThoughts'));
    }

    public function add($id =null) 
    {
        if ($this->request->is('post')) {
            $this->Thought->create();
            $document_id = $id;
            $thought = $this->request->data;
            $thought['Thought']['user_id'] = $this->Auth->user('id');
            $thought['Thought']['document_id'] = $document_id;
            if ($this->Thought->save($thought)) {
                $this->Flash->flash_success(__('投稿しました。'));
                //https://book.cakephp.org/1.3/ja/The-Manual/Developing-with-CakePHP/Controllers.html
                //$this->dataにデータが入っている(FormHelper のフォームからコントローラに送られた、POST データ)
                return $this->redirect(['action' => 'view',$document_id]);
            }
            $this->Flash->flash_error(__('投稿に失敗しました。'));
        }
    }

    public function edit($id = null, $document_id = null) 
    {
        if (!$id) {
            throw new NotFoundException(__('無効な投稿です。'));
        }

        $thought = $this->Thought->findById($id);
        if (!$thought) {
            throw new NotFoundException(__('無効な投稿です。'));
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Thought->id = $id;
            if ($this->Thought->save($this->request->data)) {
                $this->Flash->flash_success(__('編集に成功しました。'));
                return $this->redirect(['action' => 'view', $document_id]);
            }
            $this->Flash->flash_error(__('編集に失敗しました。'));
        }
        if (!$this->request->data) {
            $this->request->data = $thought;
        }
    }

    public function delete($id = null, $document_id = null) 
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        
        if ($this->Thought->delete($id)) {
            $this->Flash->flash_success　(
                __('投稿を削除しました。 ')
            );
            
        } else {
            $this->Flash->flash_error　(
                __('投稿を削除できませんでした。')
            );
        }
        //$this->log($thread_id, LOG_DEBUG);
        //$threadId = $message->thread_id;
        //$message = $this->Message->get($id, ['contain' => ['thread_id']]);
        return $this->redirect　(['action' => 'view', $document_id]);
    }
}