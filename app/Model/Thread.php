<?php


class Thread extends AppModel
{
    public $validate = [
        'title' => [
            'rule' => 'notBlank'
        ],
        'type' => [
            'rule' => 'notBlank'
        ]];

    public $hasMany = ['Message' => ['className' => 'Message',
                                    ],
                        'ThreadLike' => ['className' => 'ThreadLike',
                                        ]];

    public $belongsTo = 'User';
}