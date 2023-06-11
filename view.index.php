<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

<!------- titulo gastos 2023 -------------->
    <div class="container text-center" >
        <div class="row">
            <h1>GASTOS 2023</h1>
        </div>

    </div>
<!------- ----------------------------------->
 


<!------- boton añadir archivo semanal -------------->

    <div class="container" >
        <div class="row">
        
            <div class="col">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>archivo semanal</button>
            </div>
        </div>

    </div>
<!--------------------------------------------------->



    
  
<!---------------- Modal ------------------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
<!---------header------------------------------->
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva semana</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
<!---------header------------------------------->
<!---------body------------------------------->
    
    <div class="modal-body">
        <form action="">
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="nuemro_semana" placeholder="Ingresa el número de semana" required>
                <label for="nuemro_semana">Ingresa el número de semana</label>
            </div>
            <br>
        <!---------footer-------------------------------> 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
        <!---------footer------------------------------->
        </form>
    </div>
<!---------body------------------------------->

    </div>
</div>
</div>
<!---------------- Modal ------------------------------->





<!------- Tabla de archivos semanales -------------->

    <div class="container">
        <div class="row">
            
            <table class="table table-hover">
                
                <tbody>
                    <?php foreach($res as $row): ?>
                        <tr>
                            <td>semana</td>
                            <td><?php echo $row['numero_semana'] ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>


        </div>

    </div>
<!------- ------------------------------------------>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>