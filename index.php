<?php
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
    <div class="container" >

        <br>
        <?php if ($mensaje!="") { ?>
            <div class="alert alert-success">
                <?php echo $mensaje; ?>
                <a href="mostrarCarrito.php"class="badge badge-success" >Ver Carrito</a>      
            </div>
        <?php }?>
            <div class="row">

            <?php
            $sentencia=$pdo->prepare("SELECT * FROM `tblproductos`");
            $sentencia->execute();
            $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
            
            ?>  

            <?php foreach($listaProductos as $producto){?>
            
            
            
                <div class="col-3">
                    <div class="card">
                        <img 
                        title="<?php echo "$producto[Nombre]" ?>" 
                        alt="<?php echo "$producto[Nombre]" ?>" 
                        class=" card-img-top" 
                        src="<?php echo "$producto[Imagen]" ?>" 
                        data-toggle="popover"
                        data-trigger="hover"
                        data-content="<?php echo "$producto[Descripcion]" ?>?"
                        height="340px"
                        >
                        <div class="card-body">
                            <span><?php echo "$producto[Nombre]" ?> </span>
                            <h5 class="card-title">$<?php echo "$producto[Precio]" ?> </h5>
                            <p class="card-text">Descripcion</p>
                            
                            <form action="" method="post">
                            
                            <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                            <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                            <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY);?>">
                            <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                            
                            <button class="btn btn-primary" 
                                name="btnAccion"
                                value="Agregar"
                                type="submit"
                                >
                                Agregar al Carrito
                            </button>
                            
                            </form>
                        </div>
                    </div>
                </div>
            
            
            <?php } ?>    
    </div>


<!--bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>    
<script src="js/script.js"></script>

<?php 
include 'templates/pie.php';
?>