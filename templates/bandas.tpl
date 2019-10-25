<table class="tabla-noticias">
    <thead>
        <tr>
            <td>Banda</td>
            <td>Año</td>
            <td>Cantidad de canciones</td>
            <td>Mas Info</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$bandas item=banda}
        <tr>
            <td>{$banda->banda}</td>
            <td>{$banda->anio}</td>
            <td>{$banda->cantidadCanciones}</td>
            <td><a href="masinfo">Mas Detalles</a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
