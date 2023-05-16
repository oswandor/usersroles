<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Users Form</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<?php if (isset($successMessage)): ?>
        <div class="alert alert-success" role="alert">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>
    

<form action="/users" method="POST" >

<div class="form-group row">
    <div class="col-sm-10">
      <input  name="id_usuario" type="hidden" class="form-control" id="inputEmail3" placeholder="iduser" value="<?= $lastId; ?>">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input name="nombre" type="text" class="form-control" id="inputEmail3" placeholder="Nombre">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Constraseña</label>
    <div class="col-sm-10">
      <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Contraseña">
    </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
      <div class="col-sm-10">
      <?php foreach ($roleslist as $rol): ?>

        <div class="form-check">
          <input class="form-check-input" type="radio" name="rol_id" id="gridRadios2" value=" <?= $rol['id_rol']; ?>">
          <label class="form-check-label" for="gridRadios2">
          <?= $rol['nombre']; ?>
          </label>
        </div>
    <?php endforeach; ?>
        


      </div>
    </div>
  </fieldset>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Crear</button>
    </div>
  </div>
</form>


</body>
</html>