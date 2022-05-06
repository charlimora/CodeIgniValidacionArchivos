<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3>Formulario</h3>
        <?php if(isset($validacion)): ?>
            <div class="text-danger">
                <?= $validacion->listErrors(); ?>
            </div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="email">Text</label>
                <input id="email" class="form-control" type="text" name="email">
            </div>
            <!--<div class="form-group">
                <label for="miarchivo">Cargue una imagen</label>
                <br>
                <input id="miarchivo" type="file" name="miarchivo">
            </div> -->
            <div class="form-group">
                <label for="miarchivo">Cargue una imagen</label>
                <br>
                <input id="miarchivo" type="file" multiple name="archivo[]">
            </div>
            <?php
                echo '<pre>';
                print_r($_POST);
                echo '</pre>';
            ?> 
            <button class="btn btn-dark" type="submit">Enviar</button>                      
        </form>
    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>