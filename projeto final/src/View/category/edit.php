<h1>editar categoria</h1>
<?php $registro = $data->fetch(\PDO::FETCH_ASSOC);?>

<form action="" method="post" class="form-group">
<label for="name">Nome</label>
<input id="name" name="name" value="<?php echo $registro['name'];?>" type="text" class="form-control" required>
<label for="description">Descrição</label>
<input id="description" name="description" value="<?php echo $registro['description'];?>" type="text" class="form-control" required>
<input id="id" name="id" value="<?php echo $registro['id'];?>" type="text" hidden>
<input type="submit" value="Editar" class="btn btn-dark">

</form>