{include file="header.tpl"}

<div class="centrar-contenido view">
    <section class="bg-dark borde grande">
        <form action="admin/eventos/editar/{$evento->id_evento}" method="POST">
            <div class="centrar-contenido">
                <h3 class="blanco">Editar: {$evento->evento}</h3>
            </div>
                
            <div class="form-group">
                <label for="input-evento" class="blanco">Evento</label>
                <input type="text" name="evento" class="form-control campo-vacio" id="input-evento" placeholder="Nombre del evento" value="{$evento->evento}">
                <div class="invalid-feedback">Ingresa un evento</div>
            </div>

            <div class="form-group">
                <label for="input-ciudad" class="blanco">Ciudad del evento</label>
                <input type="text" name="ciudad" class="form-control campo-vacio" id="input-ciudad" placeholder="Ciudad del evento" value="{$evento->ciudad}">
                <div class="invalid-feedback">Ingresa una ciudad</div>
            </div>

            <div class="form-group">
                <label for="input-detalle" class="blanco">Detalle del evento</label>
                <input type="text" name="detalle" class="form-control campo-vacio" id="input-detalle" placeholder="Detalle del evento" value="{$evento->detalle}">
                <div class="invalid-feedback">Ingresa un detalle del evento</div>
            </div>

            <div class="form-group">
                <label for="banda-asociada" class="blanco">Banda asociada</label>
                <select class="custom-select" name="id_banda" id="banda-asociada">
                    {foreach from=$bandas item=banda}
                        <option value="{$banda->id_banda}">{$banda->banda}</option>
                    {/foreach}
                </select>
            </div>

            <input class="none" value="{$evento->id_evento}" id="id_evento">

            <div class="botonera">
                <button type="submit" class="btn btn-primary ancho campos-vacios margen-der">Editar</button>
                <a href="admin/eventos" class="btn btn-primary ancho margen-izq">Cancelar</a>
            </div>
        </form>
    </section>
</div>

{include file="footer.tpl"}