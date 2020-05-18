<?php
App::uses('Folder', 'Utility'); 

class DocumentsController extends AppController {

    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Thread.id' => 'asc'
        )
    );

    public function index() {
        $this->set('documents', $this->paginate());
    }
    
    public function add(){

        if (!empty($this->request->data)) {

            $upload_file_rename = date("YmdHis").rand(0,20000);
            $this->log($this->request->data,LOG_DEBUG);
            $data = [
                'Document' => [
                    'user_id' => $this->Auth->user('id'),
                    'title' => $this->request->data['Document']['title'],
                    'details' => $this->request->data['Document']['details'],
                    'name'    => $this->request->data['Document']['filename']['name'],
                    'filename' => $upload_file_rename."_".$this->request->data['Document']['filename']['name'],
                    'filetype' => $this->request->data['Document']['filename']['type'],
                    'filesize' => $this->request->data['Document']['filename']['size']
            ]];
            //コンテンツwebrootのパスをDBに保存
            $file =$this->request->data['Document'];
            $data_save_path = WWW_ROOT.DS.'img'.DS.'uploads'. DS;
            $move_uploaded_file = move_uploaded_file($file['filename']['tmp_name'], $data_save_path.$upload_file_rename."_".$file['filename']['name']);
            
            $this->log($move_uploaded_file,LOG_DEBUG);

            if ($move_uploaded_file) {
                $this->Document->save($data);
                $this->Flash->flash_success('アップロードしました');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->flash_error('アップロードできませんでした');
            }
        }
        $this->set(compact('data'));
        //fileパスしてしてあげてダウンロードする。
    }

    public function download($filename = null, $name = null) {
        $this->autoRender = false;
        $path = WWW_ROOT.DS.'img'.DS.'uploads'. DS.$filename;

        if (!empty($name)) {
            $this->response->file($path, ['download' => true]);
            $this->response->download($filename);
        } else {
            $this->Flash->flash_error('ファイルがない為ダウンロードできませんでした');
        }
    }

    public function edit($id = null, $user_id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }
    
        $document = $this->Document->findById($id);
        
        if (!$document) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($user_id !== $this->Auth->user('id')) {
            $this->Flash->flash_error(
                __('他のユーザーの投稿は削除できません')
            );
            return $this->redirect(['action' => 'threads']);
        }

        $upload_file_rename = date("YmdHis").rand(0,20000);

        if ($this->request->is(['post', 'put'])) {
            $this->Document->id = $id;

            $data = [
                'Document' => [
                    'user_id' => $this->Auth->user('id'),
                    'title' => $this->request->data['Document']['title'],
                    'details' => $this->request->data['Document']['details'],
                    'name'    => $this->request->data['Document']['filename']['name'],
                    'filename' => $upload_file_rename."_".$this->request->data['Document']['filename']['name'],
                    'filetype' => $this->request->data['Document']['filename']['type'],
                    'filesize' => $this->request->data['Document']['filename']['size']
            ]];
            $file =$this->request->data['Document'];
            $data_save_path = WWW_ROOT.DS.'img'.DS.'uploads'. DS;
            move_uploaded_file($file['filename']['tmp_name'], $data_save_path.$upload_file_rename."_".$file['filename']['name']);
                
            
            
            if (!empty($data['Document']['name'])) {
                $this->Document->save($data);
                $this->Flash->flash_success(__('資料を修正しました'));
                return $this->redirect(['action' => 'index']);

            } else if (empty($data['Document']['name'])) {
                $this->Document->save($data['Document'],false , ['title' , 'details']);
                $this->Flash->flash_success(__('資料を修正しました'));
                return $this->redirect(['action' => 'index']);
            } 
            $this->Flash->error(__('資料を修正できませんでした'));
        }
        //更新画面の表示
        if (!$this->request->data) {
            $this->request->data = $document;
        }
        $this->set(compact('document'));
    }

    public function delete($id = null , $user_id = null) {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($user_id !== $this->Auth->user('id')) {
            $this->Flash->flash_error(
                __('他のユーザーの投稿は削除できません')
            );
            return $this->redirect(['action' => 'index']);
        }

        if ($this->Document->delete($id)) {
            $this->Flash->flash_success(
                __('スレッドの削除に成功しました。')
            );
        } else {
            $this->Flash->flash_error(
                __('スレッドの削除に失敗しました。')
            );
        }
        return $this->redirect(array('action' => 'index'));
    }
}