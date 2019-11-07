{include file="html.tpl" }
{include file="header.tpl" }


<div class="centrar-contenido margen-tabla-admin">
    <table class="tabla-noticias ancho">
        <thead>
            <tr>
                <td>Banda</td>
                <td>Año</td>
                <td>Cantidad de canciones</td>
                <td>Evento</td>
                <td>Editar</td>
                <td>Eliminar</td>
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
                <td>
                    <!--<a href="admin/bandas/editar/{$banda->id_banda}" class="btn btn-primary ancho">Editar</a> -->
                    <a href="admin/bandas/editar/{$banda->id_banda}">
                        <i class='far fa-edit' style='font-size:24px'></i>
                    </a>
                </td>
                {if $banda->evento eq null}
                    <td>
                        <a href="admin/bandas/eliminar/{$banda->id_banda}">
                            <i class="fa fa-trash-o rojo" style="font-size:24px"></i>
                        </a>
                    </td>
                {else}
                    <td>No disponible</td>
                {/if}
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>


<div class="centrar-contenido admin margen-abajo">
    
    <section class="bg-dark borde grande margen-abajo">

        <form action="admin/bandas" method="POST" id="btns-formulario">
            <div class="centrar-contenido">
                <h3 class="blanco" id="nombre-banda">Agregar</h3>
            </div>
                
            <div class="form-group">
                <label for="banda" class="blanco">Banda</label>
                <input type="text" name="banda" class="form-control largo campo-vacio" id="input-banda" placeholder="Nombre de la banda">
                <div class="invalid-feedback">Ingresa una banda</div>
            </div>

            <div class="form-group">
                <label for="cant-canciones" class="blanco">Cantidad de canciones</label>
                <input type="number" name="cant-canciones" class="form-control largo campo-vacio" id="input-cantidad" placeholder="Cantidad de canciones de la banda" min="0">
                <div id="error-cantidad" class="invalid-feedback">Ingresa la cantidad de canciones</div>
            </div>

            <div class="form-group">
                <label for="anio" class="blanco">Año</label>
                <input type="number" name="anio" class="form-control largo campo-vacio" id="input-anio" placeholder="Año de la banda" min="1900">
                <div class="invalid-feedback">Ingresa un año</div>
            </div>

            <input type="submit" src="admin/bandas/agregar" class="btn btn-primary campos-vacios ancho margen-der btns-formulario" value="Agregar">
        </form>  
        
    </section>
</div>
{include file="footer.tpl" }