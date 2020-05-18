<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel 
{
    public $hasMany = ['Thread' => ['className' => 'Thread'], 'Message' => ['className' => 'Message'], 
                        'Document' => ['className' => 'Document'], 'Thought' => ['className' => 'Thought'],
                        'ThreadLike' => ['className' => 'ThreadLike', 'dependent' => true]];

    public $validate = ['username' => ['required' => ['rule' => 'notBlank', 'message' => 'ユーザー名が入力されていません。']
        ],
        'password' => ['required' => ['rule' => 'notBlank', 'message' => 'パスワードが必要です。']
        
        ],
        'nickname' => ['required' => ['rule' => 'notBlank', 'message' => 'ニックネームが入力されていません。']
    ]];

    public function beforeSave($options = array()) 
    {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}