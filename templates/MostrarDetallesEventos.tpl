{include file="header.tpl"}
{include file="correo.tpl"}

<div class="container cuadro blanco">
    <h2>Evento Detallado</h2>
    {foreach from=$eventos item=evento}
        <div class="form-group">
            <label for="nombreForm">Nombre del evento</label>
            <input type="text" class="form-control" id='nombreForm' name="nombreForm" value="{$evento->evento}">
        </div>
        <div class="form-group">
            <label for="precioForm">Ciudad</label>
            <input type="text" class="form-control" id="precioForm" name="precioForm" value="{$evento->detalle}" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="descripcionForm">Banda anfriotiona</label>
            <input type="text" class="form-control" id="descripcionForm" name="descripcionForm" value="{$evento->banda}" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="materialForm">Precio de la entrada</label>
            <input type="text" class="form-control" id="materialForm" name="materialForm" value="">
        </div>
      {/foreach}
</div>

{include file="footer.tpl"}
