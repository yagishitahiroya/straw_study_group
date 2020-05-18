<?php

class ThreadLike extends AppModel 
{

    public $belongsTo = ['User' => ['className' => 'User',
    'dependent' => true],
    'Thread' => ['className' => 'Thread',
    'dependent' => true]];

    
}