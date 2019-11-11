<div class="centrar-contenido blanco">
  <h2>Proximos Eventos (item)</h2>
</div>


<table class="table">
    <thead class="thead-dark">
        <tr>
            <th src="evento" class="js-orden link" value="eventos" scope="col">Nombre del evento</th>
            <th src="ciudad" class="js-orden link" value="eventos" scope="col">Ciudad</th>
            <th src="banda" class="js-orden link" value="eventos" scope="col">Banda asociada</th>
            <th scope="col">Mas info</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$eventos item=evento}
            <tr>
                <td>{$evento->evento}</td>
                <td>{$evento->ciudad}</td>
                <td>{$evento->banda}</td>
                <td><a href="VerEvento/{$evento->id_evento}">Mas Detalles</a></td>
            </tr>
        {/foreach}
    </tbody>
</table>