
<main class="auth">
    
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Coloca tu nuevo Password</p>

    <?php
        require_once __DIR__ . '/../templates/alertas.php'
    ?>

<?php if($token_valido){ ;?>
    <form class="formulario" method="POST" >
        
        
        
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Nuevo Password</label>
            <input
                type="password"
                class="formulario__input"
                placeholde="Tu Password"
                id="password"
                name="password"
            >
        </div>
        
        

        <input type="submit" class="formulario__submit" value="Actualizar Password">

        <div class="acciones">
            <a href="/login" class="acciones__enlace">Iniciar Sesion</a>
            <a href="/olvide" class="acciones__enlace">Olvidaste tu password?</a>
        </div>

    </form>
    
<?php } ?>
</main>
