{include file="html.tpl" }
{include file="header.tpl" }


<div class="centrar-contenido admin">
    <table class="tabla-noticias">
        <thead>
            <tr>
                <td>Evento</td>
                <td>Detalle</td>
                <td>Banda asociada</td>
                <td>Seleccionar</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$eventos item=evento}
                <tr>
                    <td name="{$evento->id}">{$evento->nombre}</td>
                    <td>{$evento->detalle}</td>
                    <td name="{$evento->id_banda}">{$evento->banda}</td>
                    <td><button class="btn btn-primary btn-seleccionar-evento" name="{$evento->id}">Seleccionar</button></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>


<div class="centrar-contenido admin">
    
    <section class="bg-dark borde grande">

        <form action="admin/eventos/agregar-evento" method="POST">
            <div class="centrar-contenido">
                <h3 class="blanco" id="nombre-evento">Agregar</h3>
            </div>
                
            <div class="form-group">
                <label for="evento" class="blanco">Evento</label>
                <input type="text" name="evento" class="form-control largo campo-vacio" id="input-evento" placeholder="Nombre del evento">
                <div class="rojo oculto">Ingresa un evento</div>
            </div>

            <div class="form-group">
                <label for="detalle" class="blanco">Detalle del evento</label>
                <input type="text" name="detalle" class="form-control largo campo-vacio" id="input-detalle" placeholder="Detalle del evento">
                <div id="error-cantidad" class="rojo oculto">Ingresa un detalle del evento</div>
            </div>

            <div class="form-group">
                <select class="custom-select" name="id_banda" id="banda-asociada">
                    {foreach from=$bandas item=banda}
                        <option value="{$banda->id_banda}">{$banda->banda}</option>
                    {/foreach}
                </select>
            </div>

            <input class="none" name="id_evento" id="id_evento">
            
            <div id="botonera">
                <div>
                    <button type="submit" class="btn btn-primary campos-vacios ancho margen-der" name="btn-agregar">Agregar</button>
                    <button type="submit" class="btn btn-primary campos-vacios ancho margen-izq none" name="btn-editar" id="btn-editar">Editar</button>
                </div>
                <div class="blanco none">Esta banda no se puede eliminar porque pertenece al evento: <span id="nombre-evento"></span></div>
                <button type="submit" class="btn btn-danger ancho  none" name="btn-eliminar" id="btn-eliminar">Eliminar</button>
            </div>
        </form>  
        
    </section>
</div>
{include file="footer.tpl" }