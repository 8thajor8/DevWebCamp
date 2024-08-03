<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>



<div class="dashboard__contenedor">
    <?php if(!empty($registrados)){ ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Email</th>
                    <th scope="col" class="table__th">Paquete</th>
                    <th scope="col" class="table__th">Regalo</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>
    
            <tbody class="table__body">
                <?php foreach($registrados as $registro){ ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $registro->usuario->apellido . ', ' . $registro->usuario->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->usuario->email; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->paquete->nombre ; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->regalo->nombre ; ?>
                        </td>
                        
                        
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>

        <p class="text-center">No Hay Ponentes Aun</p>

    <?php } ?>
</div>

<?php
    echo $paginacion;
?>