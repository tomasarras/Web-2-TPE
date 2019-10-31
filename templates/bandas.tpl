<div class="centrar-contenido">
    <h2>Bandas(Categorias)</h2>
</div>

<table class="tabla-noticias ancho margen-abajo">
    <thead>
        <tr>
            <td src="banda" class="js-orden link" value="bandas">Banda</td>
            <td src="anio" class="js-orden link" value="bandas">Año</td>
            <td src="cantidadCanciones" class="js-orden link" value="bandas">Cantidad de canciones</td>
            <td>Mas Info</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$bandas item=banda}
            <tr>
                <td>{$banda->banda}</td>
                <td>{$banda->anio}</td>
                <td>{$banda->cantidadCanciones}</td>
                <td><a href="MasDetallesBanda/{$banda->id_banda}">Mas Detalles</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>