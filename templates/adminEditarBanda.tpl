{include file="header.tpl"}

<div class="centrar-contenido view">
    <section class="bg-dark borde grande botonera-admin">
        <form action="admin/bandas" method="POST">
            
            <div class="centrar-contenido">
                <h3 class="blanco">Editar: {$banda->banda}</h3>
            </div>
                
            <div class="form-group">
                <label for="input-banda" class="blanco">Banda</label>
                <input type="text" name="banda" class="form-control largo campo-vacio" id="input-banda" placeholder="Nombre de la banda" value="{$banda->banda}">
                <div class="invalid-feedback">Ingresa una banda</div>
            </div>

            <div class="form-group">
                <label for="input-cantidad" class="blanco">Cantidad de canciones</label>
                <input type="number" name="cant-canciones" class="form-control largo campo-vacio" id="input-cantidad" placeholder="Cantidad de canciones de la banda" min="0" value="{$banda->cantidad_canciones}">
                <div id="error-cantidad" class="invalid-feedback">Ingresa la cantidad de canciones</div>
            </div>

            <div class="form-group">
                <label for="input-anio" class="blanco">Año</label>
                <input type="number" name="anio" class="form-control largo campo-vacio" id="input-anio" placeholder="Año de la banda" min="1900" value="{$banda->anio}">
                <div class="invalid-feedback">Ingresa un año</div>
            </div>

            <input class="none" id="id_banda" value="{$banda->id_banda}">

            <div class="botonera">
                <button class="btn btn-primary campos-vacios margen-der ancho" id="btn-editar">Editar</button>
                <button class="btn btn-primary ancho margen-izq">Cancelar</button>
            </div>
        </form>
    </section>
</div>

<script src="./js/editarBanda.js"><script>

{include file="footer.tpl"}