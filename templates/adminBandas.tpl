{include file="header.tpl"}

<section class="container margen-arriba">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Banda</th>
                <th scope="col">Año</th>
                <th scope="col">Cantidad de canciones</th>
                <th scope="col">Evento</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        {include file="vue/Bandas.tpl"}
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
            Seguro queres borrar la banda: <span id="js-nombre-elemento"></span>?
        </h5>

        
        <button class="btn btn-danger" id="btn-borrar">Borrar</button>
        <button class="btn btn-primary js-cerrar">Cancelar</button>
        
    </div>	
</section>


<div class="centrar-contenido margen-vertical">
    <section class="bg-dark borde grande blanco">

        <div class="centrar-contenido">
            <h3 class="blanco">Agregar</h3>
        </div>
            
        <div class="form-group">
            <label for="input-banda">Banda</label>
            <input type="text" name="banda" class="form-control campo-vacio" id="input-banda" placeholder="Nombre de la banda">
            <div class="invalid-feedback">Ingresa una banda</div>
        </div>

        <div class="form-group">
            <label for="input-cantidad">Cantidad de canciones</label>
            <input type="number" name="cant-canciones" class="form-control campo-vacio" id="input-cantidad" placeholder="Cantidad de canciones de la banda" min="0">
            <div id="error-cantidad" class="invalid-feedback">Ingresa la cantidad de canciones</div>
        </div>

        <div class="form-group">
            <label for="input-anio">Año</label>
            <input type="number" name="anio" class="form-control campo-vacio" id="input-anio" placeholder="Año de la banda" min="1900" max="9999">
            <div class="invalid-feedback">Ingresa un año</div>
        </div>

        <button class="btn btn-primary ancho" id="btn-agregar-banda">Agregar</button>
        
    </section>
</div>


{include file="footer.tpl"}