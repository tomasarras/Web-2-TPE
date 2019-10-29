{include file="html.tpl" }
{include file="header.tpl" }


<div class="centrar-contenido admin">
    <table class="tabla-noticias">
        <thead>
            <tr>
                <td>Banda</td>
                <td>Año</td>
                <td>Cantidad de canciones</td>
                <td>Evento</td>
                <td>Editar banda</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$bandas item=banda}
            <tr>
                <td>{$banda->banda}</td>
                <td>{$banda->anio}</td>
                <td>{$banda->cantidadCanciones}</td>
                {if $banda->evento eq null}
                    <td name="sin-evento">Ningun evento asignado</td>
                {else}
                    <td>{$banda->evento}</td>
                {/if}
                <td><button class="btn btn-primary btn-seleccionar-banda" name="{$banda->id_banda}">Seleccionar</button></td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>


<div class="centrar-contenido admin">
    
    <section class="bg-dark borde grande">

        <form action="admin/bandas" method="POST" id="btns-formulario">
            <div class="centrar-contenido">
                <h3 class="blanco" id="nombre-banda">Agregar</h3>
            </div>
                
            <div class="form-group">
                <label for="banda" class="blanco">Banda</label>
                <input type="text" name="banda" class="form-control largo campo-vacio" id="input-banda" placeholder="Nombre de la banda">
                <div class="rojo oculto">Ingresa una banda</div>
            </div>

            <div class="form-group">
                <label for="cant-canciones" class="blanco">Cantidad de canciones</label>
                <input type="number" name="cant-canciones" class="form-control largo campo-vacio" id="input-cantidad" placeholder="Cantidad de canciones de la banda">
                <div id="error-cantidad" class="rojo oculto">Ingresa la cantidad de canciones</div>
            </div>

            <div class="form-group">
                <label for="anio" class="blanco">Año</label>
                <input type="number" name="anio" class="form-control largo campo-vacio" id="input-anio" placeholder="Año de la banda">
                <div class="rojo oculto">Ingresa un año</div>
            </div>

            <input class="none" name="id" id="id_banda">
            
            <div id="botonera">
                <div>
                    <input type="submit" src="admin/bandas/agregar" class="btn btn-primary campos-vacios ancho margen-der btns-formulario" value="Agregar">
                    <input type="submit" src="admin/bandas/editar" class="btn btn-primary campos-vacios ancho margen-izq none btns-formulario" id="btn-editar" value="Editar">
                </div>
                <div class="blanco none">Esta banda no se puede eliminar porque pertenece al evento: <span id="nombre-evento"></span></div>
                <input type="submit" src="admin/bandas/eliminar" class="btn btn-danger ancho  none btns-formulario" id="btn-eliminar" value="Eliminar">
            </div>
        </form>  
        
    </section>
</div>
{include file="footer.tpl" }