<?php
class Node {
    public $data;
    public $next;
    public $prev;

    //mengidentifikasi terlebih dahulu setiap datanya
    public function __construct($d){
        $this->data = $d;
        $this->next = null;
        $this->prev = null;
    }
}

class DLLNCH {
   public $head;

   //mengidentifikasi terlebih dahulu datanya
   public function __construct(){
    $this->head = null;
    }

    //untuk mengecek apakah data kosong atu tidak
    public function LEmpty(){
        if ($this->head == null){
            return 1;
        }else{
            return 0;
        }
    }

    //untuk menambhakan data dari depan
    public function insertD($d){
        $newNode = new Node($d);

        if($this->LEmpty()){
            $this->head = $newNode;
        }else{
            $newNode->next = $this->head;
            $this->head->prev = $newNode;
            $this->head = $newNode;
        }
    }

    //untuk menambahkan data dari belakang
    public function insertB($d){
        $newNode = new Node($d);

        if($this->LEmpty()){
            $this->head = $newNode;
        }else{
            $temp = $this->head;
            while($temp->next != null){
                $temp = $temp->next;
            }
            $temp->next = $newNode;
            $newNode->prev = $temp;
            $newNode->next = null;
        }
    }

    //untuk menghapus data dari depan
    public function HapusD(){
        if(!$this->LEmpty()){
            if($this->head->next == null ){
                $this->head = null;
            }else{
                $hapus = $this->head;
                $this->head = $this->head->next;
                $this->head->prev = null;
                $hapus->next = null;
                unset($hapus);
            }
        }else{
            echo "<br>List kosong";
        }
    }

    //untuk menghapus data dari belakang 
    public function HapusB(){
        if($this->head == null){
            echo "Linked list kososng\n";
            return;
        }else if($this->head->next == null){
            $this->head = null;
            return;
        }else{
            $temp = $this->head;
            while ($temp->next->next != null){
                $temp = $temp->next;
            }
            $hapus = $temp->next;
            $temp->next = null;
            $hapus->prev = null;
            unset($hapus);
        }
    }

    //untuk mencetak setiap datanya
    public function printList(){
        if($this->head == null){
            echo "Linked list kosong\n";
            return;
        }
        $current = $this->head;
        while($current != null){
            echo $current->data."";
            $current = $current->next;
        }
        echo "\n";
    }

    //untuk menghapus semua data
    public function clear(){
        if ($this->LEmpty()){
            echo "Link list kososng\n";
            return;
        }
        $temp = $this->head;
        $hapus = null;

        do{
            $hapus = $temp;
            $temp = $temp->next;
            unset ($hapus);
        }while ($temp != null);
        $this->head = null;
        echo "Link List berhasil dihapus\n";
    }
}

//output
$CL = new DLLNCH();
$CL ->insertD(11);
$CL ->insertD(55);
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
?>