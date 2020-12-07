<?php
if ($_REQUEST) {
    switch (true) {
        case (empty($_REQUEST['resistencia'])):
            $_REQUEST['resistencia'] = $_REQUEST['voltaje']/$_REQUEST['intensidad'];
            break;
        case (empty($_REQUEST['voltaje'])):
            $_REQUEST['voltaje'] = $_REQUEST['resistencia']*$_REQUEST['intensidad'];
            break;
        case (empty($_REQUEST['intensidad'])):
            $_REQUEST['intensidad'] = $_REQUEST['voltaje']/$_REQUEST['resistencia'];
            break;
        default: 
            unset($_REQUEST);
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Ley de Ohm</title>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script>
            function borrar() {
                let inputs = document.getElementsByTagName('input');
                for (let i = 0; i < 3; i++) {
                    inputs[i].value = '';
                }
            }
        </script>
    </head>
    <body>
        <div class="container" id="registration-form">
            <div class="image"></div>
            <div class="frm">
                <h1>Introduce 2 valores</h1>
                <form action='' method='post'>
                    <div class="form-group">
                        <label for="intensidad">Intensidad:</label>
                        <input type="text" class="form-control" name="intensidad" placeholder="Introduce la Intensidad" pattern='[0-9]+(\.{1}[0-9]+)*' value='<?=(!empty($_REQUEST['intensidad']))?$_REQUEST['intensidad']:''?>'>
                    </div>
                    <div class="form-group">
                        <label for="Voltaje">Voltaje:</label>
                        <input type="text" class="form-control" name="voltaje" placeholder="Introduce el Voltaje" pattern='[0-9]+(\.{1}[0-9]+)*' value='<?=(!empty($_REQUEST['voltaje']))?$_REQUEST['voltaje']:''?>'>
                    </div>
                    <div class="form-group">
                        <label for="resitencia">Resistencia:</label>
                        <input type="text" class="form-control" name="resistencia" placeholder="Introduce la Resistencia" pattern='[0-9]+(\.{1}[0-9]+)*' value='<?=(!empty($_REQUEST['resistencia']))?$_REQUEST['resistencia']:''?>'>
                    </div>
                   
                    
                    <div class="form-group">
                        <input type='submit' class="btn btn-success btn-lg" id='send' value='Calcular'>
                        <button type='button' class="btn btn-success btn-lg" onclick='borrar();'>Borrar</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
