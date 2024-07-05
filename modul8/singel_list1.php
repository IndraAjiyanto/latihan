<?php
    class Node {
        public $data;
        public $next;

        public function __construct($d)
        {
            $this->data = $d;
            $this->next = null;
           
        }
    }

    class SLLCH{    
        public $head;
        //inisialisasi dan LEmpty
        public function _construct(){
             $this->head = null;
        }
        
        public function LEmpty(){
            if ($this->head === null) {
                return 1;
            } else {
                return 0;
            }
        }

        //untuk menambahkan data di depan
        public function insertD($d){
            $newNode = new Node($d);
            //bila Node kosong, maka langsung ditambah data baru
            if ($this->LEmpty()) {
                $newNode->next = $newNode;
                $this->head = $newNode;
            } else {
                //bila sudah terisi maka harus melalui proses
                $temp = $this->head;
                while ($temp->next != $this->head) {
                    $temp = $temp->next;
                }
                $newNode->next = $this->head;
                $this->head = $newNode;
                $temp->next = $this->head;
            }
        }

        public function insertB($d){
            $newNode = new Node($d);
            if ($this->LEmpty()) {
                $newNode->next = $newNode;
                $this->head = $newNode;
            } else {
                $temp = $this->head;
                while ($temp->next != $this->head) {
                    $temp = $temp->next;
                }
                $temp->next = $newNode;
                $newNode->next = $this->head;
            }
        }

        public function hapusD(){
            if (!$this->LEmpty()) {
                if ($this->head->next === $this->head) {
                    $this->head = null;
                } else {
                    $temp = $this->head;
                    while ($temp->next != $this->head) {
                        $temp = $temp->next;
                    }
                    $this->head = $this->head->next;
                    $temp->next = $this->head;
                }
            }
        }

        public function hapusB() {
            if (!$this->LEmpty()) {
                if ($this->head->next === $this->head) {
                    $this->head = null;
                } else {
                    $temp = $this->head;
                    while ($temp->next->next != $this->head) {
                        $temp = $temp->next;
                    }
                    $temp->next = $this->head;
                }
            }
        }

        public function printList(){
            if ($this->LEmpty()) {
                echo "List Kosong";
            } else {
                $temp = $this->head;
                do {
                    echo $temp->data . " ";
                    $temp = $temp->next;
                } while (
                    $temp != $this->head
                );
            }
        }

        public function clear(){
            if ($this->LEmpty()) {
                echo "Link list kosong\n";
                return;
            }
            $temp = $this->head;
            $hapus = null;

            do {
                $hapus = $temp;
                $temp = $temp->next;
                unset ($hapus);
            } while (
                $temp != $this->head
            );
            $this->head = null;
            echo "Link list berhasil dihapus\n";
        }
    }
    
    $CL = new SLLCH();
    $CL ->insertD(11);
    $CL ->insertD(22);
    $CL ->insertD(33);
    $CL ->insertB(44);
    echo "Isi Linked List : ";
    $CL ->printList();
    
    echo "<hr><br>Hapus Node Pertama<br>";
    $CL ->HapusD();
    echo "Isi Linked List setelah dihapus ";
    $CL ->printList();
    
    echo "<hr><br>Hapus Node Terakhir<br>";
    $CL ->HapusB();
    echo "Isi Linked list setelah dihapus ";
    $CL ->printList();
    
    echo "<hr><br>Hapus Semua Node<br>";
    $CL ->clear();
    
    echo "<br>Isi Linked List setelah dihapus : <br>";
    $CL ->printList();