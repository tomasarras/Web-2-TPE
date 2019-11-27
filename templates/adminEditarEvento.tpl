{include file="header.tpl"}

<div class="centrar-contenido margen-arriba">
    <section class="bg-dark borde blanco contenedor-grande margen-abajo">
        <form action="admin/eventos/editar/{$evento->id_evento}" method="POST" class="margen-horizontal" enctype="multipart/form-data">
            <div class="centrar-contenido">
                <h3 class="margen-arriba">Editar: {$evento->evento}</h3>
            </div>
                
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="input-evento">Evento</label>
                    <input type="text" name="evento" class="form-control campo-vacio" id="input-evento" placeholder="Nombre del evento" value="{$evento->evento}">
                    <div class="invalid-feedback">Ingresa un evento</div>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="input-ciudad">Ciudad del evento</label>
                    <input type="text" name="ciudad" class="form-control campo-vacio" id="input-ciudad" placeholder="Ciudad del evento" value="{$evento->ciudad}">
                    <div class="invalid-feedback">Ingresa una ciudad</div>
                </div>
            </div>


            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="input-detalle">Detalle del evento</label>
                    <input type="text" name="detalle" class="form-control campo-vacio" id="input-detalle" placeholder="Detalle del evento" value="{$evento->detalle}">
                    <div class="invalid-feedback">Ingresa un detalle del evento</div>
                </div>

                <div class="form-group col-12 col-md-6 margen-abajo">
                    <label for="banda-asociada" class="blanco">Banda asociada</label>
                    <select class="custom-select" name="id_banda" id="banda-asociada">
                        {foreach from=$bandas item=banda}
                            <option value="{$banda->id_banda}">{$banda->banda}</option>
                        {/foreach}
                    </select>
                </div>
            </div>

            <div class="custom-file margen-abajo">
                <input type="file" class="custom-file-input" name="imagesToUpload[]" id="validatedCustomFile" multiple>
                <label class="custom-file-label" for="validatedCustomFile">Agregar imagenes...</label>
            </div>

            <input class="none" value="{$evento->id_evento}" id="id_evento">

            {if $imagenes}
            <div id="carouselExampleIndicators" class="carousel slide margen-abajo" data-ride="carousel">

                <ol class="carousel-indicators">
                    {assign var=i value=0}
                    {foreach from=$imagenes item=imagen}
                        <li data-target="#carouselExampleIndicators" data-slide-to="{$i}" {if $i == 0} class="active" {/if}></li>
                        {assign var=i value=$i+1}
                    {/foreach}
                </ol>
                

                <div class="carousel-inner">

                    {assign var=i value=0}
                    {foreach from=$imagenes item=imagen}
                        <div class="carousel-item {if $i == 0} active {/if}">
                            <a class="btn btn-danger ancho" href="admin/eventos/{$evento->id_evento}/eliminar/imagen/{$imagen->id_imagen}">
                                Borrar imagen
                            </a>
                            <img class="d-block w-100" src="./{$imagen->ruta}">
                        </div>
                        {assign var=i value=$i+1}
                    {/foreach}

                </div>
                
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
            {/if}
            
            
            <div class="botonera margen-abajo">
                <button type="submit" class="btn btn-primary ancho campos-vacios margen-der">Editar</button>
                <a href="admin/eventos" class="btn btn-primary ancho margen-izq">Cancelar</a>
            </div>
        </form>
    </section>
</div>

{include file="footer.tpl"}