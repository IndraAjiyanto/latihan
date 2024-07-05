<?php
class Node{
    public $data;
    public $next;
    public $prev;

    public function __construct($d){
        $this->data = $d ;
        $this->next = null;
        $this->prev = null;
    }
}

class DLLNCHT{
    private $head;
    private $tail;

    public function  __construct(){
        $this->head = null;
        $this->tail = null;
    }

    public function Empty(){
        if($this->head == null && $this->tail == null){
            return 1;
        }else{
            return 0;
        }
    }

    public function InsertD($d){
        $newNode = new Node($d);

        if($this->Empty()){
            $this->head = $newNode;
            $this->tail = $newNode;
        }else{
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
    }

    public function InsertB($d){
        $newNode = new Node($d);

        if($this->Empty()){
            $this->head = $newNode;
            $this->tail = $newNode;
        }else{
            $this->tail->next = $newNode;
            $newNode->prev = $this->tail;
            $this->tail = $newNode;
        }
    }

    public function HapusD(){
        if(!$this->Empty()){
            if($this->head->next == null){
                $this->head = $this->tail = null;
            }else{
                $hapus = $this->head;
                $this->head = $this->head->next;
                $this->head->prev = null;
                unset($hapus);
            }
        }else{
            echo "list kosong";
        }
    }

    public function HapusB(){
            if($this->head == null){
                echo "list kosong";
            }else if($this->head == $this->tail){
                $this->head = null;
                $this->tail = null;
            }else{
                $hapus = $this->tail;
                $this->tail = $this->tail->prev;
                $this->tail->next = null;
                unset($hapus);
            }
        }

    public function printList(){
        if($this->head == null){
            echo "list ksoong";
        }else{
            $current = $this->head;
            while($current != null){
                echo $current->data;
                $current = $current->next;
            }
            echo "\n";
        }
    }

    public function clear(){
        if($this->Empty()){
            echo "list kosong";
        }else{
            $temp = $this->head;
            $hapus = null;
            do{
                $hapus = $temp;
                $temp = $temp->next;
                unset($hapus);
            }while($temp != null);
            $this->head=null;
            $this->tail=null;
        }
    }

}


$CL = new DLLNCHT();
$CL->InsertD(11);
$CL->InsertD(55);
$CL->InsertD(33);
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