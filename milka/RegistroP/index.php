<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>Lista de pacientes</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">
   </head>
        <body>


            <?php 
            include("conexion.php");
            //select * from paciente
            $sql="select * from paciente";
            $resultado=mysqli_query($conexion,$sql);
            ?>
            <h1>Lista de pacientes</h1>
            <a href="agregar.php">Nuevo paciente</a><br><br>
            <div class="contenedor"><table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre.</th>
                        <th>Correo.</th>
                        <th>Telefono.</th>
                        <th>Acciones</th>
                    </tr>
                </thead>  <div class="contenedor">
                <tbody>
                    <?php 
                    while($filas=mysqli_fetch_assoc($resultado)){
                    ?>
                    <tr>
                        <td><?php echo $filas['id'] ?></td>
                        <td><?php echo $filas['nombre'] ?></td>
                        <td><?php echo $filas['correo'] ?></td>
                        <td><?php echo $filas['telefono'] ?></td>
                        <td>
                            <?php echo "<a href='editar.php?id=".$filas
                            ['id']."'>Editar<a/>"; ?>
                            -
                            <?php echo "<a href='eliminar.php?id=".$filas
                            ['id']."'>Eliminar<a/>"; ?>
                        </td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
            <?php 
            mysqli_close($conexion);
            ?>
        </body>
    </head>
</html>