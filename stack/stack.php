<?php

    class Node {

        private $data;
        private $next;

        function __construct($data, $next){

            $this->data = $data;
            $this->next = $next;
        }

        public function getData(){

            return $this->data;
        }

        public function setData($data){

            $this->data = $data;
        }

        public function getNext(){

            return $this->next;
        }

        public function setNext($next){

            $this->next = $next;
        }
    }


    class Stack {

        public $top;
        private $size;

        function __construct(){

            $this->top = null;
            $this->size = 0;
        }

        public function getSize(){

            return $this->size;
        }

        public function push($data){

            $node = new Node($data, null);

            if(!$this->getSize()){

                $this->top = $node;
                $this->size++;
                return;
            }

            $node->setNext($this->top);
            $this->top = $node;

            $this->size++;
        }

        public function pop(){

            if(!$this->getSize())return 'stack is empty';

            $node = $this->top;

            $data = $node->getData();
            $this->top = $node->getNext();

            $this->size--;

            return $data;
        }

        public function read(){

            if(!$this->getSize())return 'stack is empty';

            $currentNode = $this->top;
            $tempArray = array();

            while ($currentNode) {
                $tempArray []= $currentNode->getData();
                
                $currentNode = $currentNode->getNext();
            }

            return $tempArray;
        }

        public function check($data){

            if(!$data)return 'pass an valid data';

            if(!$this->getSize())return 'stack is empty';

            $currentNode = $this->top;
            $i = 0;

            while($currentNode){

                if($currentNode->getData() == $data){

                    return $i;
                }

                $currentNode = $currentNode->getNext();
                $i++;
            }

            return false;
        }

        public function empty(){

            $this->top = null;
        }
    }

    $stack = new Stack();

    $stack->push(1);
    $stack->push(2);
    $stack->push(3);
    $stack->push(4);
    $stack->push(5);
    $stack->push(6);
    $stack->pop();
 
    print_r($stack->read());
    print_r($stack->check(2));