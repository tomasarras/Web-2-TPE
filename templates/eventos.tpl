<div class="centrar-contenido">
  <h2>Proximos Eventos (item)</h2>
</div>

<table class="tabla-noticias ancho margen-abajo">
    <thead>
        <tr>
            <td src="nombre" class="js-orden link" value="eventos">Nombre del evento</td>
            <td src="detalle" class="js-orden link" value="eventos">Ciudad</td>
            <td src="banda" class="js-orden link" value="eventos">Banda Asociada</td>
            <td>Mas Info</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$eventos item=evento}
        <tr>
            <td>{$evento->nombre}</td>
            <td>{$evento->detalle}</td>
            <td>{$evento->banda}</td>
            <td><a href="VerEvento/{$evento->id}">Mas Detalles</a></td>
        </tr>
        {/foreach}
    </tbody>
</table>