<?php
    class Node 
    {
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
        public $tail;
     
        public function _construct()
        {
             $this->head = null;
             $this->tail = null;
        }

        //untuk mengecek data kososng atau tidak 
        public function LEmpty()
        {
            if ($this->head === null && $this->tail === null ) {
                return 1;
            } else {
                return 0;
            }
        }

        //untuk menambahkan data di depan
        public function insertD($d)
        {
            $newNode = new Node($d);

            //bila Node kosong, maka langsung ditambah data baru
            if ($this->LEmpty()) {
                $newNode->next = $newNode;
                $this->head = $newNode;
                $this->tail = $newNode;

            } else {
                //bila sudah terisi maka harus melalui proses
                $newNode->next = $this->head;
                $this->head=$newNode;
                $this->tail->next = $this->head;
            }
        }

        //untuk menambah data dari belakang
        public function insertB($d)
        {
            $newNode = new Node($d);

            //bila Node kosong, maka langsung ditambah data baru
            if ($this->LEmpty()) {
                $newNode->next = $newNode;
                $this->head = $newNode;
                $this->tail = $newNode;

                //bila sudah terisis maka harus melalui proses
            } else {
                $this->tail->next = $newNode;
                $this->tail = $this->tail->next;
                $this -> tail ->next = $this->head;
            }
        }

        //untuk manghapus data dari depan
        public function hapusD()
        {
            //bila data itu ada
            if (!$this->LEmpty()) {
                //bila data itu hanya satu
                if ($this->head->next === $this->head) {
                    $this->head = null;
                } else {
                    $this->head = $this->head->next;
                    $this->tail->next = $this->head;
                }
            }
        }

        //untuk menghapus data dari belakang
        public function hapusB() 
        {
            //bila data itu ada
            if (!$this->LEmpty()) {
                //bila data itu hanya satu
                if ($this->head->next === $this->head) {
                    $this->head = null;
                } else {
                    $temp = $this->head;
                    while($temp->next->next != $this->head){
                        $temp = $temp->next;
                    }
                    $this->tail =  $temp;
                    $this->tail->next = $this->head;
                }
            }
        }

        //untuk mencetak hasilnya
        public function printList()
        {
            //bila data kosong
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

        //untuk menghapus semua data
        public function clear()
        {
            //bila data kosong
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
            $this->tail = null;
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
    $CL ->hapusD();
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