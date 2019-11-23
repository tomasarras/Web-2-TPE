{include file="header.tpl"}

<section class="container margen-arriba">
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
        {include file="vue/Eventos.tpl"}
    </table>
</section>

<!-- popup -->
<section id="overlay" class="overlay">
    <div id="popup" class="popup">
        
        <div class="flex-end">
            <a href="javascript:void(0);" id="btn-cerrar-popup" class="btn-cerrar-popup js-cerrar">
                <i class="fa fa-times"></i>
            </a>
        </div>
        
        <h5>
            Seguro queres borrar el evento: <span id="js-nombre-elemento"></span>?
        </h5>

        
        <a class="btn btn-danger link" id="btn-borrar">Borrar</a>
        <button class="btn btn-primary js-cerrar">Cancelar</button>
        
    </div>	
</section>

<div class="centrar-contenido margen-vertical">
    <section class="bg-dark borde grande">
        <form action="admin/eventos/agregar" method="POST" enctype="multipart/form-data">

            <div class="centrar-contenido">
                <h3 class="blanco" id="nombre-evento">Agregar</h3>
            </div>
                
            <div class="form-group">
                <label for="input-evento" class="blanco">Evento</label>
                <input type="text" name="evento" class="form-control campo-vacio" id="input-evento" placeholder="Nombre del evento">
                <div class="invalid-feedback">Ingresa un evento</div>
            </div>

            <div class="form-group">
                <label for="input-ciudad" class="blanco">Ciudad del evento</label>
                <input type="text" name="ciudad" class="form-control campo-vacio" id="input-ciudad" placeholder="Ciudad del evento">
                <div class="invalid-feedback">Ingresa una ciudad</div>
            </div>

            <div class="form-group">
                <label for="input-detalle" class="blanco">Detalle del evento</label>
                <input type="text" name="detalle" class="form-control campo-vacio" id="input-detalle" placeholder="Detalle del evento">
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

            <div class="custom-file">
                <input type="file" class="custom-file-input" name="imagesToUpload[]" id="validatedCustomFile" multiple>
                <label class="custom-file-label" for="validatedCustomFile">Agregar imagenes...</label>
            </div>

            <button type="submit" class="btn btn-primary ancho margen-arriba campos-vacios">Agregar</button>
        </form>
        
    </section>
</div>

{include file="footer.tpl"}