<?php

class Thought extends AppModel {
    public $validate = ['body' => ['rule' => 'notBlank']];
    
    public $belongsTo = ['Document','User'];
}