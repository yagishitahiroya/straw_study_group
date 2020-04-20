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

    
}