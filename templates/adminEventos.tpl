{include file="header.tpl"}

<div class="centrar-contenido margen-tabla-admin">

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Evento</th>
                <th scope="col">Detalle</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Banda asociada</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$eventos item=evento}
                <tr>
                    <td name="{$evento->id_evento}">{$evento->evento}</td>
                    <td>{$evento->detalle}</td>
                    <td>{$evento->ciudad}</td>
                    <td name="{$evento->id_banda}">{$evento->banda}</td>
                    <td>
                        <a href="admin/eventos/editar/{$evento->id_evento}">
                            <i class='far fa-edit icono-tabla icono'></i>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btns-abrir-popup" name="{$evento->id_evento}">
                            <i class="fa fa-trash-o rojo icono"></i>
                        </a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>

<!-- popup -->
<div id="overlay" class="overlay">
    <div id="popup" class="popup">
        
        <div class="flex-end">
            <a href="javascript:void(0);" id="btn-cerrar-popup" class="btn-cerrar-popup js-cerrar">
                <i class="fa fa-times"></i>
            </a>
        </div>
        
        <h5>
            Seguro queres borrar el evento: <span id="js-nombre-evento"></span>?
        </h5>

        
        <a src="admin/eventos/eliminar/" class="btn btn-danger" id="btn-borrar">Borrar</a>
        <button class="btn btn-primary js-cerrar">Cancelar</button>
        
    </div>	
</div>

<div class="centrar-contenido admin margen-abajo">
    
    <section class="bg-dark borde grande margen-abajo">

        <form action="admin/eventos" method="POST" id="btns-formulario">
            <div class="centrar-contenido">
                <h3 class="blanco" id="nombre-evento">Agregar</h3>
            </div>
                
            <div class="form-group">
                <label for="input-evento" class="blanco">Evento</label>
                <input type="text" name="evento" class="form-control largo campo-vacio" id="input-evento" placeholder="Nombre del evento">
                <div class="invalid-feedback">Ingresa un evento</div>
            </div>

            <div class="form-group">
                <label for="input-detalle" class="blanco">Detalle del evento</label>
                <input type="text" name="detalle" class="form-control largo campo-vacio" id="input-detalle" placeholder="Detalle del evento">
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

            <button type="submit" src="admin/eventos/agregar" class="btn btn-primary campos-vacios ancho margen-der btns-formulario">Agregar</button>
        </form>  
        
    </section>
</div>

{include file="footer.tpl" }