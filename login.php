<?php require("header.php"); ?>



<div  class="container">
    <div  class="row justify-content-center mt-5 ">
        <div class="col-4 w-auto ">
            <form class="p-4 shadow p-3 mb-5 bg-body-tertiary rounded " action="validar.php" method="POST">
            <div class="col text-center">
                <h4>Login App Gastos BYS</h4>
            </div>
            <div class="mb-3"class="col-md-6">
                <label for="logintext" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="logintext" name="usuario">
                
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="loginPassword" name="pass">
            </div>
            <button type="submit" class="btn btn-primary">Acceder</button>
            </form>
        </div>
    </div>
</div>

 <?php require("footer.php"); ?>


    