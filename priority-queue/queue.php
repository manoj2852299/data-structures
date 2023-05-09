<?php

    class Node {

        private $data;
        private $next;
        private $prev;

        function __construct($data, $next, $prev){

            $this->data = $data;
            $this->next = $next;
            $this->prev = $prev;
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

        public function getPrev(){

            return $this->prev;
        }

        public function setPrev($prev){

            $this->prev = $prev;
        }
    }

    class MinPriorityQueue {

        public $head;
        private $tail;
        private $size;

        function __construct(){

            $this->head = null;
            $this->tail = null;
            $this->size = 0;
        }

        public function getSize(){

            return $this->size;
        }

        public function isEmpty(){

            return $this->size == 0;
        }


        public function enqueue($data){

            if($this->isEmpty()){

                $this->head = $this->tail = new Node($data, null, null);
                $this->size++;
                return;
            }

            $currentNode = $this->head;

            while($currentNode){

                if($currentNode->getData() >= $data){

                    $node = new Node($data, $currentNode, $currentNode->getPrev());
                    $currentNode->getPrev()->setNext($node);
                    $currentNode->setPrev($node);
                    
                    $this->size++;
                    return;
                }

                $currentNode = $currentNode->getNext();
            }

            $node = new Node($data, null, $this->tail);
            $this->tail->setNext($node);
            $this->tail = $this->tail->getNext();

            $this->size++;

        }
    }

    $queue = new MinPriorityQueue();

    $queue->enqueue(1);
    $queue->enqueue(2);
    $queue->enqueue(10);
    $queue->enqueue(4);
    $queue->enqueue(4);
    $queue->enqueue(7);
    $queue->enqueue(3);
    print_r($queue->head);