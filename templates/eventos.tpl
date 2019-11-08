<div class="centrar-contenido blanco">
  <h2>Proximos Eventos (item)</h2>
</div>


<table class="table">
    <thead class="thead-dark">
        <tr>
            <th src="nombre" class="js-orden link" value="eventos" scope="col">Nombre del evento</th>
            <th src="detalle" class="js-orden link" value="eventos" scope="col">Detalle</th>
            <th src="banda" class="js-orden link" value="eventos" scope="col">Banda asociada</th>
            <th scope="col">Mas info</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$eventos item=evento}
            <tr>
                <td>{$evento->evento}</td>
                <td>{$evento->detalle}</td>
                <td>{$evento->banda}</td>
                <td><a href="VerEvento/{$evento->id_evento}">Mas Detalles</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>