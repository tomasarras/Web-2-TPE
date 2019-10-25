<table class="tabla-noticias">
    <thead>
        <tr>
            <td>Nombre del evento</td>
            <td>Ciudad</td>
            <td>Banda Asociada</td>
            <td>Mas Info</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$eventos item=evento}
        <tr>
            <td>{$evento->nombre}</td>
            <td>{$evento->detalle}</td>
            <td>{$evento->banda}</td>
            <td><a href="masdetalles">Mas Detalles</a></td>
        </tr>
        {/foreach}
    </tbody>
</table>
