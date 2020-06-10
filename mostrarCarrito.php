<?php
include 'global/config.php';
include 'carrito.php';
include 'templates/cabecera.php';
?>
<br>
<h3>Lista del Carrito.</h3>

<?php if (!empty($_SESSION['CARRITO']) ) {?>
<table class="table table-black table-bordered">
    <tbody>
        <tr>
            <th widht="40%">Descripcion</th>
            <th widht="15%" class="text-center" >Cantidad</th>
            <th widht="20%" class="text-center">Precio</th>
            <th widht="20%" class="text-center"> Total</th>
            <th widht="5%"> </th>
        </tr>  
    <?php $total=0; ?>    
    <?php foreach ($_SESSION['CARRITO'] as $indice=>$producto) {?>
        
        <tr>
            <td widht="40%"><?php echo $producto['NOMBRE'] ?></td>
            <td widht="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
            <td widht="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
            <td widht="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2); ?></td>
            <td widht="5%"  class="text-center">
            
            <form action="" method="post" >

                <input type="hidden" 
                name="id"
                id="id" 
                value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                
                    <button class="btn btn-danger" 
                    type="submit"
                    name="btnAccion"
                    value="Eliminar"
                    >Eliminar</button>
            
            </form>
            
            </td>
                </tr> 
    <?php $total= $total+($producto['PRECIO']*$producto['CANTIDAD']);?>     
    <?php } ?>    

        <tr>
            <td colspan="3" align="right" > <h3>Total</h3> </td>
            <td align="right" > <h3>$<?= number_format($total,2); ?> </h3></td>
            <td></td>
        </tr>
    </tbody>
</table>
<?php }else{ ?>
<div class="alert alert-success" >
    No hay productos en el carrito...
</div>
 
<?php } ?>   
<?php include 'templates/pie.php'; ?>