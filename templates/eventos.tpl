<section class="tabla-eventos">
    <div class="centrar-contenido">
        <h2>Proximos Eventos (item)</h2>
    </div>


    <table class="table">
        <thead class="thead-dark">
            <tr class="no-link">
                <th></th>
                <th name="evento" scope="col">
                    <a href="?eventos=evento">Nombre del evento</a>
                </th>
                <th name="ciudad" scope="col">
                    <a href="?eventos=ciudad">Ciudad</a>
                </th>
                <th name="banda"  scope="col">
                    <a href="?eventos=banda">Banda asociada</a>
                </th>
                <th scope="col">Mas info</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$eventos item=evento}
                <tr>
                    <td> 
                    {if $evento->path_preview == ''}
                        <div class="default-event"></div>
                    {else}
                        <img src="{$evento->path_preview}" class="preview-event"></td>
                    {/if}
                    <td>{$evento->evento}</td>
                    <td>{$evento->ciudad}</td>
                    <td>{$evento->banda}</td>
                    <td><a href="ver-evento/{$evento->id_evento}">Mas Detalles</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>