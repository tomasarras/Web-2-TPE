{include file="header.tpl"}

<div class="centrar-contenido view">
    <section class="bg-dark borde grande blanco">
        <form action="admin/bandas" method="POST">
            
            <div class="centrar-contenido">
                <h3>Editar: {$banda->banda}</h3>
            </div>
                
            <div class="form-group">
                <label for="input-banda">Banda</label>
                <input type="text" name="banda" class="form-control campo-vacio" id="input-banda" placeholder="Nombre de la banda" value="{$banda->banda}">
                <div class="invalid-feedback">Ingresa una banda</div>
            </div>

            <div class="form-group">
                <label for="input-cantidad">Cantidad de canciones</label>
                <input type="number" name="cant-canciones" class="form-control campo-vacio" id="input-cantidad" placeholder="Cantidad de canciones de la banda" min="0" value="{$banda->cantidad_canciones}">
                <div id="error-cantidad" class="invalid-feedback">Ingresa la cantidad de canciones</div>
            </div>

            <div class="form-group">
                <label for="input-anio">Año</label>
                <input type="number" name="anio" class="form-control campo-vacio" id="input-anio" placeholder="Año de la banda" min="1900" max="9999" value="{$banda->anio}">
                <div class="invalid-feedback">Ingresa un año</div>
            </div>

            <input class="none" id="id_banda" value="{$banda->id_banda}">

            <div class="botonera">
                <button class="btn btn-primary margen-der ancho" id="btn-editar">Editar</button>
                <button class="btn btn-primary ancho margen-izq">Cancelar</button>
            </div>
        </form>
    </section>
</div>

<script type="module" src="./js/editarBanda.js"><script>

{include file="footer.tpl"}