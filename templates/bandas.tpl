<section class="tabla-bandas">
    <div class="centrar-contenido">
        <h2>Bandas(Categorias)</h2>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr class="no-link">
                <th scope="col">
                    <a href="?bandas=banda">Banda</a>
                </th>
                <th scope="col">
                    <a href="?bandas=anio">año</a>
                </th>
                <th scope="col">
                    <a href="?bandas=cantidad-canciones">Cantidad de canciones</a>
                </th>
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
</section>