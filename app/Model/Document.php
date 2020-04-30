<?php

class Document extends AppModel {
    public $validate = ['title' => ['rule' => 'notBlank'],
                        'filename' => ['rule' => 'notBlank']];

    public $hasMany = ['Thought' => ['className' => 'Thought',
                        'dependent' => true]];

    public $belongsTo = 'User';
}