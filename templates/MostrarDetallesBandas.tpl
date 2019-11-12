{include file="header.tpl"}
{include file="correo.tpl"}

<div class="container cuadro blanco">
    {foreach from=$bandas item=banda}
        <h2>Ver detalle de la banda numero : {$banda->id_banda}</h2>
        <div class="form-group">
            <label for="nombreForm">Nombre Completo</label>
            <input type="text" class="form-control" id='nombreForm' name="nombreForm" value="{$banda->banda}">
        </div>
        <div class="form-group">
            <label for="precioForm">Cantidad de canciones creadas</label>
            <input type="text" class="form-control" id="precioForm" name="precioForm" value="{$banda->cantidad_canciones}" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="descripcionForm">Año de creacion</label>
            <input type="text" class="form-control" id="descripcionForm" name="descripcionForm" value="{$banda->anio}" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="materialForm">Precio de la entrada</label>
            <input type="text" class="form-control" id="materialForm" name="materialForm" value="">
        </div>
    {/foreach}
</div>

{include file="footer.tpl"}