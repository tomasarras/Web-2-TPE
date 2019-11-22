<section class="tabla-eventos">
    <div class="centrar-contenido">
        <h2>Proximos Eventos (item)</h2>
    </div>


    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre del evento</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Banda asociada</th>
                <th scope="col">Mas info</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$eventos item=evento}
                <tr>
                    <td>{$evento->evento}</td>
                    <td>{$evento->ciudad}</td>
                    <td>{$evento->banda}</td>
                    <td><a href="ver-evento/{$evento->id_evento}">Mas Detalles</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>