{include file="header.tpl"}
<link rel="stylesheet" href="css/comentarios.css">

<section class="container borde fondo-blanco">
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



    <h2 class="centrado margen-arriba">Evento Detallado</h2>

    <div class="form-group">
      <label for="evento">Nombre del evento</label>
      <input type="text" class="form-control" id='evento' name="{$evento->id_evento}" value="{$evento->evento}" readonly="readonly">
    </div>

    <div class="form-group">
      <label for="ciudad">Ciudad</label>
      <input type="text" class="form-control" id="ciudad" value="{$evento->ciudad}" readonly="readonly">
    </div>
    
    <div class="form-group">
      <label for="detalle">Detalle</label>
      <input type="text" class="form-control" id="detalle" value="{$evento->detalle}" readonly="readonly">
    </div>

    <div class="form-group">
      <label for="banda-asociada">Banda anfriotiona</label>
      <input type="text" class="form-control" id="banda-asociada" value="{$evento->banda}" readonly="readonly">
    </div>

    <!--
    <div class="form-group">
      <label for="materialForm">Precio de la entrada</label>
      <input type="text" class="form-control" id="materialForm" name="materialForm" value="">
    </div>-->

  {include file="vue/Comentarios.tpl"}
</section>

{include file="footer.tpl"}