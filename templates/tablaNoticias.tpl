<h1>{$titulo}</h1>

<input type="text">
<button>Filtrar</button>

<table class="tabla-noticias">
    <thead>
        <tr>
            <td>Banda</td>
            <td>Año</td>
            <td>Cantidad de canciones</td>
            <td>Eventos</td>
            <td>Detalle</td>
        </tr>
    </thead>
    <tbody>
        {foreach from=$bandas item=banda}
        <tr>
            <td>{$banda->banda}</td>
            <td>{$banda->anio}</td>
            <td>{$banda->cantidadCanciones}</td>
            <td>
                {foreach from=$banda->eventos item=evento}
                    {$evento->nombre},
                {/foreach}
            </td>
            <td>...</td>
        </tr>
        {/foreach}
    </tbody>
</table>