{if $logueado}
<div class="container">
  <div class="row">
  <div class="col-12">
<form class="" action="filtrarEventos" method="post">
      <h4>Buscar evento por banda</h4> <select name = "banda" >
      {foreach from=$bandas item=banda}
        <option value="{$banda->id_banda}">{$banda->banda}</option>
      {/foreach}
    </select>
    <button type="submit" name="button">Filter</button>
    </div>
  </div>
</form>
</div>
{/if}
<h2>Proximos Eventos (item)</h2>
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
