{include file="html.tpl" }
{include file="header.tpl" }


<div class="centrar-contenido admin">
    <table class="tabla-noticias">
        <thead>
            <tr>
                <td>Banda</td>
                <td>Año</td>
                <td>Cantidad de canciones</td>
                <td>Editar banda</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$bandas item=banda}
            <tr>
                <td>{$banda->banda}</td>
                <td>{$banda->anio}</td>
                <td>{$banda->cantidadCanciones}</td>
                <td><button class="btn btn-primary editar-tabla btn-mostrar" name="{$banda->id_banda}">Seleccionar</button></td>
            </tr>
            {/foreach}
        </tbody>
    </table>
</div>


<div class="centrar-contenido admin">
    <button class="btn btn-primary btn-mostrar">Agregar banda</button>
    
    <section class="bg-dark borde grande none" id="contenedor-mostrar">
        <div class="alinear-derecha cerrar">
            <button class="btn btn-danger">X</button>
        </div>

        <form action="agregar-banda" method="POST">
            <div class="centrar-contenido">
                <h3 class="blanco">Agregar</h3>
            </div>
                
            <div class="form-group">
                <label for="banda-add" class="blanco">Banda</label>
                <input type="text" name="banda-add" class="form-control largo campo-vacio" id="banda-add" placeholder="Nombre de la banda">
                <div class="rojo oculto">Ingresa una banda</div>
            </div>

            <div class="form-group">
                <label for="cant-canciones-add" class="blanco">Cantidad de canciones</label>
                <input type="text" name="cant-canciones-add" class="form-control largo campo-vacio" id="cant-canciones-add" placeholder="Cantidad de canciones de la banda">
                <div id="error-cantidad" class="rojo oculto">Ingresa la cantidad de canciones</div>
            </div>

            <div class="form-group">
                <label for="anio-add" class="blanco">Año</label>
                <input type="text" name="anio-add" class="form-control largo campo-vacio" id="anio-add" placeholder="Año de la banda">
                <div class="rojo oculto">Ingresa un año</div>
            </div>
            
            <div class="centrar-contenido">
                <button type="submit" class="btn btn-primary" id="campos-vacios">Agregar</button>
            </div>
        </form>  
        
    </section>
</div>
{include file="footer.tpl" }