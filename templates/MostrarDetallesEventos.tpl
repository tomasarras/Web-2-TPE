{include file="header.tpl"}

<div class="container cuadro rojo">
    <!-- carousel bootstrap -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        {assign var=i value=0}
        {foreach from=$imagenes item=imagen}
          <li data-target="#carouselExampleIndicators" data-slide-to="{$i}" {if $i == 0} class="active" {/if}></li>
          {assign var=i value=$i+1}
        {/foreach}
      </ol>

      <div class="carousel-inner">

        {assign var=i value=0}
        {foreach from=$imagenes item=imagen}
          <div class="carousel-item {if $i == 0} active {/if}">
            <img class="d-block w-100" src="./{$imagen->ruta}">
          </div>
          {assign var=i value=$i+1}
        {/foreach}

      </div>
      
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>



    <h2>Evento Detallado</h2>
    {foreach from=$eventos item=evento}
        <div class="form-group">
            <label for="nombreForm">Nombre del evento</label>
            <input type="text" class="form-control" id='nombreForm' name="{$evento->id_evento}" value="{$evento->evento}">
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

    {include file="vue/Comentarios.tpl"}
</div>

{include file="footer.tpl"}
