<?php

App::import("Controller", "ThreadLikes");
App::uses('HttpSocket', 'Network/Http');

class ThreadsController extends AppController
{
    public $helpers = ['Html', 'Form'];
    public $components = ['GetLikes'];

    public $paginate = array(
        'limit' => 5,
        'order' => array(
            'Thread.id' => 'asc'
        )
    );

    public function getWantPaginate()
    {

    }

    public function getCanPaginate()
    {

    }

    public function threads()
    {
        //$threads = $this->Thread->find('all');
        //$this->set(compact('threads'));
        $wants = $this->Thread->find('all', ['conditions' => ['type' => 'したい']]);
        $cans = $this->Thread->find('all', ['conditions' => ['type' => 'できる']]);
        // $wants_ajax = $this->Thread->ThreadLike->find('all', ['conditions' => ['type' => 'したい']]);

        //$like = $this->Thread->ThreadsLike->find('all');
        //$likes = $this->GetLikes->getLoginUsersLikes();
        //$this->set('threads', $this->paginate());
        $ThreadLikesController = new ThreadLikesController;
        $likes_data = $ThreadLikesController->likes_data();
        // $likes_count = $ThreadLikesController->add();
        // $this->log($likes_count, LOG_DEBUG);
        $thread_like = $this->Thread->ThreadLike->find('all',['conditions' => ['type' => 'したい']]);
        // $this->log($thread_like,LOG_DEBUG);
        $this->set(compact('wants', 'cans','likes_data'));

    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Thread->create();
            //$this->Thread->user_id = $this->Auth->user('id');
            $thread = $this->request->data;
            //$this->log($thread, LOG_DEBUG);
            $thread['Thread']['user_id'] = $this->Auth->user('id');
            if ($this->Thread->save($thread)) {
                $this->log($this->Thread->getLastInsertID(), LOG_DEBUG);
                $last_id = $this->Thread->getLastInsertID();
                $this->chatWorkNotification($thread, $last_id);
                $this->Flash->flash_success(__('スレッドが保存されました'));
                return $this->redirect(['action' => 'threads']);
            }
            $this->Flash->flash_error(__('スレッドを追加できませんでした'));
        }
    }

    public function chatWorkNotification($thread, $last_id)
    {
        //chatworkに通知を送るメソッド
        //HttpSocket()
        $Auth = $this->Auth->user('nickname');
        $type = $thread['Thread']['type'];
        $title = $thread['Thread']['title'];
        $details = $thread['Thread']['details'];
        $thread_url = "http://localhost:9000/messages/view/" . $last_id;
        $content = "[info][title]". $Auth . "さんがスレッドを投稿しました！" ."[/title]". "\n" . "【スレッドタイプ】: " . $type . "\n" .
                    "【タイトル】: " . $title . "\n" . "【詳細】: " . $details . "\n" . "このスレッドを見にいく ➡️ ". $thread_url . "[/info]";
        $request = ['header' => [
            'X-ChatWorkToken' => 'a580f264a153a95e87ab5a99ee49a3d8',
            'Content-Type' => 'application/x-www-form-urlencoded'],
            'body' => ['body' => $content]
            ];
        $url = "https://api.chatwork.com/v2/rooms/151590091/messages";

        //$thread_data = $this->Thread->findById($thread['Thread']['id']);
        $data = [];
        $HttpSocket = new HttpSocket();

        // if (!empty($thread)) {
        //     $response = $HttpSocket->post($url, $data, $request);
        // }
        // $this->log($response, LOG_DEBUG);

    }

    public function edit($id = null, $user_id = null)
    {
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

    public function delete($id = null , $user_id = null)
    {
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