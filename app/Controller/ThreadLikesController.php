<?php 

App::uses('AppController', 'Controller');

class ThreadLikesController extends AppController 
{
    public $helpers = ['Html', 'Form'];

    public function likes_data()
    {
        $this->ThreadLike->unbindModel(array(
            'belongsTo' => ['User','Thread'],
            )
        );
        // $this->log($this->ThreadLike->find('all'),LOG_DEBUG);
        // $this->log($this->ThreadLike->find('all'),LOG_DEBUG);
        return Hash::extract($this->ThreadLike->find('all', [
            'conditions' => ['ThreadLike.user_id' => SessionComponent::read('Auth.User.id')],
            'fields' => 'ThreadLike.thread_id'
        ]), '{n}.ThreadLike.thread_id');
        // return $this->ThreadLike->find('all');
        
    }

    public function likes_count()
    {
        $this->ThreadLike->find(‘count’, array(‘fields’=>’id’));
    }

    public function add()
    {
        $this->autoRender = false;
        
        

        if ($this->request->is('ajax')) {
            
            $create_like = $this->ThreadLike->create();

            
            $request = $this->request->data;
            //$this->log($request, LOG_DEBUG);
            $create_like['ThreadLike']['user_id'] = $request[0]['user_id'];
            $create_like['ThreadLike']['thread_id'] = $request[1]['thread_id'];

            $data = $create_like['ThreadLike']['thread_id'];

            if ($this->ThreadLike->save($create_like)) {
                $count =$this->ThreadLike->find('count', ['conditions' => ['ThreadLike.thread_id' => $data]]);
                
                $this->log($count, LOG_DEBUG);


                return json_encode([$count, $request]);
            }

            $this->Flash->flash_error(__('いいねを追加できませんでした。'));
        }
        
    }

    public function delete()
    {
        $this->autoRender = false;

        if ($this->request->is('ajax')) {
            $request = $this->request->data;

            $param = [
                'ThreadLike.user_id' => $request[0]['user_id'],
                'ThreadLike.thread_id' => $request[1]['thread_id'],
            ];
            // $this->log($param, LOG_DEBUG);
            // $this->Thread->ThreadLike->connection()->logQueries(true);
            $data = $request[1]['thread_id'];
            if ($this->ThreadLike->deleteAll($param)) {
                $count =$this->ThreadLike->find('count', ['conditions' => ['ThreadLike.thread_id' => $data]]);
                $this->log($count, LOG_DEBUG);

                // $count = $this->Favorites->countFavorite($this->request->getData('post_id'))->count();

                return json_encode([$count, $request]);
                
            } else {
                $this->Flash->flash_error(__('The favorite could not be deleted. Please, try again.'));
            }
        }
    }
}