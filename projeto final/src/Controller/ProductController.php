<?php 
declare(strict_types=1);
namespace App\Controller;
use App\Connection\Connection;
use Dompdf\Dompdf;
class ProductController extends AbstractController {
   
        public function listAction(): void
    {
      $con = Connection::getConnection();
          $query = 'SELECT * FROM tb_product';
          $preparação = $con->prepare($query);
          $preparação->execute();
          $query = 'SELECT * FROM tb_category';
          $cat = $con->prepare($query);
          $cat->execute();
        
      parent::render('product/list', $preparação, $cat);
    }
    public function addAction(): void
    {
      $con = Connection::getConnection();
      if($_POST){
        $date = date('Y-m-d H:i:s',time());
        $query = "INSERT INTO tb_product (name, description, photo, value, category_id, quantity, created_at ) VALUES ( '{$_POST['name']}','{$_POST['description']}','{$_POST['photo']}','{$_POST['value']}','{$_POST['category_id']}','{$_POST['quantity']}','{$date}') ";
        $preparação = $con->prepare($query);
        $preparação->execute();
        echo'<div class="alert alert-success" role="alert">sucesso</div>';
        
      }
          $query = 'SELECT * FROM tb_category';
          $data = $con->prepare($query);
          $data->execute();
      parent::render('product/add',$data);
    }
    public function editAction(): void
    {
        if($_POST){
          $id = $_POST['id'];
          $con = Connection::getConnection();
          $query = "UPDATE tb_product SET name ='{$_POST['name']}', description = '{$_POST['description']}', photo = '{$_POST['photo']}', value = '{$_POST['value']}',quantity = '{$_POST['quantity']}', category_id = {$_POST['category_id']}  WHERE id = {$id}";
          $preparação = $con->prepare($query);
          $preparação->execute();
          echo'<div class="alert alert-success" role="alert">sucesso</div>';
          
        }
        $id = $_GET['id'];
        $con = Connection::getConnection();
        $query = 'SELECT * FROM tb_product WHERE id ='.$id;
        $preparação = $con->prepare($query);
        $preparação->execute();
        $query = 'SELECT * FROM tb_category';
        $cat = $con->prepare($query);
        $cat->execute();
      parent::render('product/edit',$preparação,$cat);
    }
    
    public function deleteAction(){
      $id = $_GET['id'];
      $con = Connection::getConnection();
      $query = 'DELETE FROM tb_product WHERE id ='.$id;
      $preparação = $con->prepare($query);
      $preparação->execute();
      echo'<div class="alert alert-success" role="alert">sucesso</div>';
      $this->listAction();
    }
    public function reportAction(){
      $con = Connection::getConnection();
      $query = 'SELECT name, quantity, category_id,id FROM tb_product';
      $preparação = $con->prepare($query);
      $preparação->execute();
      $query = 'SELECT * FROM tb_category';
      $cat = $con->prepare($query);
      $cat->execute();
      $content ='';
      while ( $registro = $preparação->fetch(\PDO::FETCH_ASSOC)){
        extract($registro);
        while ( $cat2= $cat->fetch(\PDO::FETCH_ASSOC)){
            if($cat2['id']==$category_id){
                $catname = $cat2['name'];
            }
        }
        $content.="
        <tr>
          <td>{$id}</td>
          <td>{$name}</td>
          <td>{$quantity}</td>
          <td>{$catname}</td>
       </tr>";
}
      $html = "<h1> Relatorio de Produtos no estoque</h1>
      <table border='1' width='100%'>
      <thead >
          <th>ID</th>
          <th>nome</th>
          <th>quantidade</th>
          <th>categoria</th>
      </thead>
      <tbody>
      {$content}
      </tbody>
      </table>";

     
   // instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
    }

}