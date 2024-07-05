<?php
class Node{
    public $data;
    public $next;
    public $prev;

    public function __construct($d){
        $this->data = $d;
        $this->next = $this;
        $this->prev = $this;
    }
}

class DLLCHT{
    private $head;
    private $tail;

    public function Empty(){
        if($this->head == null){
            return 1;
        }else{
            return 0;
        }
    }

    public function InsertD($d){
        $newNode = new Node($d);
        $newNode->data = $d;
        $newNode->next = $newNode;
        $newNode->prev = $newNode;

        if($this->Empty()){
            $this->head = $newNode;
            $this->tail = $newNode;
            $this->head->next = $this->head;
            $this->head->prev = $this->head;
        }else{
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
            $this->head->prev = $this->tail;
            $this->tail->prev = $this->head;
        }
    }

    public function InsertB($d){
        $newNode = new Node($d);
        $newNode->data = $d;
        $newNode->next = $newNode;
        $newNode->prev = $newNode;
        if($this->Empty()){
            $this->head = $newNode;
            $this->tail = $newNode;
            $this->head->next = $this->head;
            $this->head->prev = $this->head;
        }else{
            $this->tail->next = $newNode;
            $newNode->prev = $this->tail;
            $this->tail = $newNode;
            $this->tail->next = $this->head;
            $this->head->prev = $this->tail;
        }
    }

    public function HapusD(){
        if(!$this->Empty()){
            if($this->head->next == $this->head){
                $this->head = $this->tail = null;
            }else{
                $hapus = $this->head;
                $this->head = $this->head->next;
                $this->tail->next = $this->head;
                $this->head->prev = $this->tail;
                unset($hapus);
            }
        }else{
            echo "list kosong";
        }
    }

    public function HapusB(){
        if($this->head == null){
            echo "linked list kosong\n";
        }
        if($this->head->next == $this->head){
            $this->head = $this->tail = null;
        }else{
            $hapus = $this->tail;
            $this->tail = $this->tail->prev;
            $this->tail->next = $this->head;
            $this->head->prev = $this->tail;
            unset($hapus);
        }
    }

    public function printList(){
        $current = $this->head;
        if(!$this->Empty()){
            do{
                echo $current->data . " ";
                $current = $current->next;
            }
            while($current != $this->head);
        }else{
            echo "list kosong";
        }
    }

    public function clear(){
        if($this->Empty()){
            echo "link list kosong\n";
        }
        $temp = $this->head;
        $hapus = null;

        do{
            $hapus = $temp;
            $temp = $temp->next;
            unset($hapus);
        }
        while($temp != $this->head);
        $this->head = null;
        echo "link list berhasil dihapus\n";
    }
}




$CL = new DLLCHT();
$CL->InsertD(11);
$CL->InsertD(55);
$CL->InsertB(33);
$CL->InsertB(44);
echo "isi linked list :";
$CL->printList();
echo "<hr><br>Hapus Node pertama";
$CL->HapusD();
echo "<br>isi linked list setelah dihapus :";
$CL->printList();
echo "<hr><br>Hapus Node terkahir";
$CL->HapusB();
echo "<br>isi linked list setelah dihapus :";
$CL->printList();
echo "<hr><br>Hapus Semua Node";
$CL->clear();
echo "<br>isi linked list setelah dihapus :";
$CL->printList();