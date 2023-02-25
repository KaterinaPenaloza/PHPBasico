<!--Documento PHP-->
<?php
$txtNombre="";
$radioBias="";
$chkMagic="";
$chkFreeze="";
$chkFoE="";
$lsPais="";
$txtComentario="";
//RECORDAR: sentencia -> si es verdadera ?instrucciones  (if true)
//                       si es falsa :instrucciones      (else)
    if($_POST){
        //Si hay datos en $txtNombre, lo asigna a $_POST['$txtNombre'], sino lo deja en blanco
        $txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
        $radioBias = (isset($_POST['radioBias']))?$_POST['radioBias']:"";
        //Indica si está seleccionada la opcion
        $chkMagic= (isset($_POST['chkMagic'])=="si")?"checked":"";
        $chkFreeze= (isset($_POST['chkFreeze'])=="si")?"checked":"";
        $chkFoE= (isset($_POST['chkFoE'])=="si")?"checked":"";
        $lsPais = (isset($_POST['lsPais']))?$_POST['lsPais']:"";
        $txtComentario= (isset($_POST['txtComentario']))?$_POST['txtComentario']:"";
        //$_POST contiene un arreglo de datos que se han enviado
        //print_r($_POST);
        //Obtener archivos
        print_r($_FILES['archivo']['name'].$_FILES['archivo']['tmp_name']);
        //Copiar el archivo a mi compu
        move_uploaded_file($_FILES['archivo']['tmp_name'],$_FILES['archivo']['name']);
}
?>


<!--Documento HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <!--- OBTENER DATOS  --->
    <!--- enctype permite enviar documentos por formulario -->
    <form action="ejerciciomysql3.php" enctype="multipart/form-data" method="post">
        Ingrese su nombre:<br/>
            <input value="<?php echo $txtNombre;?>" type="text" name="txtNombre" id=""><br/>
        Elije un bias:<br/>
            <input type="radio" <?php echo ($radioBias=="Soobin")?"checked":""; ?> name="radioBias" value="Soobin"> Soobin<br/>
            <input type="radio" <?php echo ($radioBias=="Yeonjun")?"checked":""; ?> name="radioBias" value="Yeonjun"> Yeonjun<br/>
            <input type="radio" <?php echo ($radioBias=="Beomgyu")?"checked":""; ?> name="radioBias" value="Beomgyu"> Beomgyu<br/>
            <input type="radio" <?php echo ($radioBias=="Taehyun")?"checked":""; ?> name="radioBias" value="Taehyun"> Taehyun<br/>
            <input type="radio" <?php echo ($radioBias=="Hueningkai")?"checked":""; ?> name="radioBias" value="Hueningkai"> Hueningkai<br/>
        Selecciona el álbum a comprar:<br/>
            <input type="checkbox" <?php echo $chkMagic ?> name="chkMagic" value="si">The Dream Chapter: Magic<br/>
            <input type="checkbox" <?php echo $chkFreeze ?> name="chkFreeze" value="si">The Chaos Chapter: Freeze<br/>
            <input type="checkbox" <?php echo $chkFoE ?> name="chkFoE" value="si">The Chaos Chapter: Fight or Escape<br/>
        Selecciona tu país:<br/>
            <select name="lsPais">
                <option value=""> [Seleccionar...]</option>
                <option value="Argentina" <?php echo ($lsPais=="Argentina")?"selected":"";?>> Argentina</option>
                <option value="Chile"     <?php echo ($lsPais=="Chile")?"selected":"";?>> Chile</option>
                <option value="Perú"      <?php echo ($lsPais=="Perú")?"selected":"";?>> Perú</option>
                <option value="Uruguay"   <?php echo ($lsPais=="Uruguay")?"selected":"";?>> Uruguay</option>
            </select><br/>
        ¿Algún comentario?: <br/>
            <textarea name="txtComentario" cols="30" rows="10"></textarea><br/>
        <br/>
        Enviar comprobante: <br/>
            <input type="file" name="archivo" id=""><br/>
        <input type="submit" value="Enviar información">
    </form>
    <?php if($_POST){ ?>
    <strong> Hola </strong>: <?php echo $txtNombre; ?> <br/>
    <strong> Tu bias es: </strong>: <?php echo $radioBias; ?> <br/>
    <strong> Tus álbumes seleccionados: </strong>:<br/>
        <?php echo ($chkMagic=="checked")?"The Dream Chapter: Magic":""; ?> <br/>
        <?php echo ($chkFreeze=="checked")?"The Chaos Chapter: Freeze":""; ?> <br/>
        <?php echo ($chkFoE=="checked")?"The Chaos Chapter: Fight or Escape":""; ?> <br/>
        <strong> Tu país de entrega es: </strong>: <?php echo $lsPais ?> <br/>
    <?php } ?>
</body>
</html>