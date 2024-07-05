<?php
class Tree{
    public $data;
    public $left;
    public $right;

    public function __construct($d){
        $this->data = $d;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree{
    public $root;

    public function __construct(){
        $this->root = null;
    }

    public function insert($d){
        $newNode = new Tree($d);
        if($this->root === null){
            $this->root = $newNode;
        }else{

            $this->insertNode($this->root, $newNode);
        }
    }

    private function insertNode(&$node, &$newNode){
        if($node == null){
            $node = $newNode;
        }else{
            if($newNode->data < $node->data){
                if($node->left == null){
                    $node->left = $newNode;
                }else{
                    $this->insertNode($node->right, $newNode);
                }
            }else{
                if($node->right == null){
                    $node->right = $newNode;
                }else{
                    $this->insertNode($node->right, $newNode);
                }
            }
        }
    }

    public function inorder($node){
        if($node !== null){
            $this->inorder($node->left);
            echo $node->data;
            $this->inorder($node->right);
        }
    }

    public function preorder($node){
        if($node !== null){
            echo $node->data . " ";
            $this->preorder($node->left);
            $this->preorder($node->right);
        }
    }

    public function postorder($node){
        if($node !== null){
            $this->postorder($node->left);
            $this->postorder($node->right);
            echo $node->data . " ";
        }
    }

    public function cari($data){
        return $this->cariNode($this->root, $data);
    }

    private function cariNode($node, $data){
        if($node == null){
            return 0;
        }
        if($node->data == $data){
            return 1;
        }
        if($data < $node->data){
           return $this->cariNode($node->left , $data);
        }else{
           return $this->cariNode($node->right, $data);
        }
    }

    public function cek($data){
        if($this->cari($data) == 1){
            echo "<br> data ". $data . " ditemukan";
        }else{
            echo "<br> data ". $data . " tidak ditemukan";
        }
    }

    public function tinggi($node){
        if($node == null){
            return 0;
        }else{
            $tinggi1 = $this->tinggi($node->left);
            $tinggi2 = $this->tinggi($node->right);
            if($tinggi1 > $tinggi2){
                return $tinggi1 + 1;
            }else{
                return $tinggi2 + 1;
            }
        }
    }

    public function hitung($node){
        if($node == null){
            return 0;
        }else{
            return 1  + $this->hitung($node->left) + $this->hitung($node->right) ;
        }
    }

    public function daun($node){
        if($node == null){
            echo "<br>Tree kosong";
        }
        if($node->left != null){
            $this->daun($node->left);
        }
        if($node->right != null){
            $this->daun($node->right);
        }
        if($node->left == null && $node->right == null){
            echo $node->data . " ";
        }
    }
}


$tr = new BinaryTree();
$tr->insert(11);
$tr->insert(55);
$tr->insert(33);
$tr->insert(8);
echo "Preorder : " ; $tr->preorder($tr->root) ;
echo "<hr>Inorder : " ; $tr->inorder($tr->root) ;
echo "<hr>Postorder : " ; $tr->postorder($tr->root) ;
$tr->cek(51);
$tr->cek(33);
echo "<br>Jumlah Node : " . $tr->hitung($tr->root);
echo "<br>Kedalaman level : " , $tr->tinggi($tr->root);
echo "<br>Daun : " , $tr->daun($tr->root);