<div class="centrar-contenido blanco">
    <h2>Bandas(Categorias)</h2>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th src="banda" class="js-orden link" value="bandas" scope="col">Banda</th>
            <th src="anio" class="js-orden link" value="bandas" scope="col">Año</th>
            <th src="cantidadCanciones" class="js-orden link" value="bandas" scope="col">Cantidad de canciones</th>
            <th scope="col">Mas info</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$bandas item=banda}
            <tr>
                <td>{$banda->banda}</td>
                <td>{$banda->anio}</td>
                <td>{$banda->cantidad_canciones}</td>
                <td><a href="ver-banda/{$banda->id_banda}">Mas Detalles</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>