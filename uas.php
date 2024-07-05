

      <?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DLLCNH</title>
</head>
<body>
    <h1>Double Linked List Circular Head Tail</h1>
    <h2>Menu</h2>
    <ol>
        <li><a href="?menu=insertD">Tambah Data di depan</a></li>
        <li><a href="?menu=insertB">Tambah Data di belakang</a></li>
        <li><a href="?menu=deleteD">Hapus Data di depan</a></li>
        <li><a href="?menu=cetak">Cetak Data</a></li>
    </ol>
</body>
</html>

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
    public function deleteD(){
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
    public function hapusB(){
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



    if(!isset($_SESSION['list'])){
        $_SESSION['list']=new DLLNCH();
    }

    function hapusD(){
        $_SESSION['list']->deleteD();
    }

    if(isset($_GET['menu'])) {

        $menu = $_GET['menu'];

        if($menu == 'insertD'){
            ?> 
            <h3>Tambah data di depan</h3>
            <form method="post">
                <label>Masukkan data :</label>
                <input type="text" name="data" required><br>
                <input type="submit" name="submit-depan" value="Simpan Data">
            </form>
    
            <?php
            if (isset($_POST['submit-depan'])) {
                $data=$_POST['data'];
                $_SESSION['list']->insertD($data);
                echo "<p>Data berhasil ditambahkan didepan.</p>";
            }
        }

        elseif($menu == 'insertB'){
            ?>
            <h3>Tambah data dibelakang</h3>
            <form method="post">
                <label>Masukkan data :</label>
                <input type="text" name="data" required><br>
                <input type="submit" name="submit-belakang" value="Simpan Data">
            </form>

            <?php
            if (isset($_POST['submit-belakang'])) {
                $data=$_POST['data'];
                $_SESSION['list']->insertB($data);
                echo "<p>Data berhasil ditambahkan di belakang.</p>";
            }
        }

        elseif($menu == 'deleteD'){
            if(!empty($_SESSION['list'])) {
                hapusD();
                echo "<p>Data pertama berhasil dihapus</p>";
            } else {
                echo "<p>List kosong</p>";
            }    
        }

        elseif($menu == 'cetak'){
            ?>
            <h3>Daftar Data :</h3>
            <table>
                <?php
                $_SESSION['list']->printList();
                ?>
            </table>
            <?php
        }
}
?>
