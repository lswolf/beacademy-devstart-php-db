<?php 
declare(strict_types=1);
namespace App\Controller;
use App\Connection\Connection;
class ClientController extends AbstractController {
        public function listAction(): void
        {
          $con = Connection::getConnection();
          $query = 'SELECT * FROM tb_category';
          $preparação = $con->prepare($query);
          $preparação->execute();
        
    
          parent::render('category/list',$preparação);
        }
        public function addAction(): void
        {
          if($_POST){
            $name = $_POST['name'];
            $description = $_POST['description'];
            $con = Connection::getConnection();
            $query = "INSERT INTO tb_category (name, description) VALUES ( '{$name}','{$description}') ";
            $preparação = $con->prepare($query);
            $preparação->execute();
            echo'<div class="alert alert-success" role="alert">sucesso</div>';
            
          }
        
          parent::render('category/add');
        }
        public function editAction(): void
        {
          if($_POST){
            //var_dump($_POST);
            $name = $_POST['name'];
            $description = $_POST['description'];
            $id = $_POST['id'];
            $con = Connection::getConnection();
            $query = "UPDATE tb_category SET name ='{$name}', description = '{$description}' WHERE id = {$id}";
            $preparação = $con->prepare($query);
            $preparação->execute();
            echo'<div class="alert alert-success" role="alert">sucesso</div>';
            
          }
          $id = $_GET['id'];
          $con = Connection::getConnection();
          $query = 'SELECT * FROM tb_category WHERE id ='.$id;
          $preparação = $con->prepare($query);
          $preparação->execute();
          parent::render('category/edit',$preparação);
        }
        

        public function deleteAction(){
          $id = $_GET['id'];
          $con = Connection::getConnection();
          $query = 'DELETE FROM tb_category WHERE id ='.$id;
          $preparação = $con->prepare($query);
          $preparação->execute();
          echo'<div class="alert alert-success" role="alert">sucesso</div>';
          $this->listAction();
        }
}
