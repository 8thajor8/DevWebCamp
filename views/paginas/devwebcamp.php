<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo ; ?></h2>

    <p class="devwebcamp__descripcion">Conoce la conferencia mas importante de Latinoamerica</p>

    <div class="devwebcamp__grid">
        <div <?php aos_animacion(); ?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" width="200" height="200" src="build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebCamp">
            </picture>
        </div>

        <div <?php aos_animacion(); ?> class="devwebcamp__contenido">
            <p class="devwebcamp__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione dignissimos eius maiores impedit velit illo accusamus autem magni tempore, omnis excepturi eveniet repellat obcaecati quia aliquid amet assumenda sunt, soluta deleniti laboriosam! Consectetur soluta nam iusto ipsum a fuga fugit modi praesentium est iure, aliquam cupiditate! Repudiandae debitis voluptate velit?</p>
            
            <p class="devwebcamp__texto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione dignissimos eius maiores impedit velit illo accusamus autem magni tempore, omnis excepturi eveniet repellat obcaecati quia aliquid amet assumenda sunt, soluta deleniti laboriosam! Consectetur soluta nam iusto ipsum a fuga fugit modi praesentium est iure, aliquam cupiditate! Repudiandae debitis voluptate velit?</p>
        </div>
    </div>
</main>