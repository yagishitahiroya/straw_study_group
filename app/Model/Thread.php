<?php


class Thread extends AppModel {
    public $validate = ['title' => ['rule' => 'notBlank']];

    public $hasMany = ['Message' => ['className' => 'Message',
                                    'dependent' => true]];

    public $belongsTo = 'User';
}