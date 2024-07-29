<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Evento</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Evento</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Evento"
            value="<?php echo $evento->nombre ?? ''; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripcion</label>
        <textarea
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripcion del Evento"
            value="<?php echo $evento->descripcion ?? ''; ?>"
            rows="8"
            
        >
        </textarea>
    </div>

    <div class="formulario__campo">
        <label for="ciudad" class="formulario__label">Categoria o Tipo de Evento</label>
        <select class="formulario__select"
            id="categoria"
            name="categoria_id"
        >
            <option value="">- Seleccionar -</option>
            <?php foreach($categorias as $categoria){ ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : '' ; ?> value="<?php echo $categoria->id ; ?>"><?php echo $categoria->nombre ; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="dia" class="formulario__label">Selecciona el dia</label>
        <div class="formluario__radio">
            <?php foreach($dias as $dia){ ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre) ; ?>"><?php echo $dia->nombre ; ?></label>
                
                    <input
                        type="radio"
                        id="<?php echo strtolower($dia->nombre) ; ?>"
                        name="dia"
                        value="<?php echo strtolower($dia->id) ; ?>"
                    />
                </div>
            <?php } ?>
            
        </div>

        <input type="hidden" name="dia_id" value="">

    </div>

    <div id="horas" class="formulario__campo">
        <label class="formulario__label">Seleccionar Hora</label>

        <ul id="horas" class="horas">
            <?php foreach($horas as $hora){ ?>
                <li data-hora-id="<?php echo $hora->id ; ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora ; ?></li>
            <?php } ?>
        </ul>

        <input type="hidden" name="hora_id" value="">
    </div>

    
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Informacion Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input
            type="text"
            class="formulario__input"
            id="ponentes"
            
            placeholder="Buscar Ponentes"
            
        >

        <ul id="listado-ponentes" class="listado-ponentes"></ul>
        <input type="hidden" name="ponente_id" value="">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input
            type="number"
            min="1"
            class="formulario__input"
            id="disponibles"
            name="disponibles"
            placeholder="Ej. 20"
            value="<?php echo $evento->disponibles ?? ''; ?>"
            
        >
    </div>

</fieldset>