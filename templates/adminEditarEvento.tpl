{include file="header.tpl"}

<div class="centrar-contenido view">
    <section class="bg-dark borde grande botonera-admin">
        <form action="admin/eventos/editar/{$evento->id_evento}" method="POST" id="btns-formulario">
            <div class="centrar-contenido">
                <h3 class="blanco">Editar: {$evento->evento}</h3>
            </div>
                
            <div class="form-group">
                <label for="input-evento" class="blanco">Evento</label>
                <input type="text" name="evento" class="form-control largo campo-vacio" id="input-evento" placeholder="Nombre del evento" value="{$evento->evento}">
                <div class="invalid-feedback">Ingresa un evento</div>
            </div>

            <div class="form-group">
                <label for="input-detalle" class="blanco">Detalle del evento</label>
                <input type="text" name="detalle" class="form-control largo campo-vacio" id="input-detalle" placeholder="Detalle del evento" value="{$evento->detalle}">
                <div id="error-cantidad" class="invalid-feedback">Ingresa un detalle del evento</div>
            </div>

            <div class="form-group">
                <label for="banda-asociada" class="blanco">Banda asociada</label>
                <select class="custom-select" name="id_banda" id="banda-asociada">
                    {foreach from=$bandas item=banda}
                        <option value="{$banda->id_banda}">{$banda->banda}</option>
                    {/foreach}
                </select>
            </div>

            <div class="botonera">
                <input type="submit" class="btn btn-primary campos-vacios margen-der" value="Editar">
                <input type="submit" src="admin/eventos" class="btn btn-primary btns-formulario margen-izq" id="btn-editar" value="Cancelar">
            </div>
        </form>  
    </section>
</div>

{include file="footer.tpl"}