
<main class="auth">
    
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Inicio sesion en DevWebcamp</p>

    <?php
        include_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form class="formulario" method="POST" action="/login">
        
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input
                type="email"
                class="formulario__input"
                placeholde="Tu Email"
                id="email"
                name="email"
            >
        </div>
        
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Password</label>
            <input
                type="password"
                class="formulario__input"
                placeholde="Tu Password"
                id="password"
                name="password"
            >
        </div>

        <input type="submit" class="formulario__submit" value="Iniciar Sesion">

        <div class="acciones">
            <a href="/registro" class="acciones__enlace">Aun no tienes una cuenta? Obtener una</a>
            <a href="/olvide" class="acciones__enlace">Olvidaste tu password?</a>
        </div>

    </form>
</main>