<?php

class Message extends AppModel {
    public $validate = ['body' => ['rule' => 'notBlank']];
    
    public $belongsTo = ['Thread','User'];

}