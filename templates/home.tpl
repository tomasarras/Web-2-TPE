{include file="header.tpl"}

<div class="container fondo-blanco borde min-size"> 

    <form class="margen-abajo" action="filtrar-eventos" method="POST"> <!-- filtro -->
        <div class="centrar-contenido">
            <h4>Buscar evento por banda</h4> 
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-primary" type="submit" name="button">Filtrar</button>
            </div>
            <select name = "banda" class="custom-select" >
                {foreach from=$bandas item=banda}
                    <option value="{$banda->id_banda}">{$banda->banda}</option>
                {/foreach}
            </select>
        </div>
    </form>


    <form method="POST" id="js-form-tablas"><!--hacer ordenamiento-->
        <input class="none" name="eventos"
        {if $ordenEvento}
            value="{$ordenEvento}"
        {/if}
        >

        <input class="none" name="bandas"
        {if $ordenBanda}
            value="{$ordenBanda}"
        {/if}
        >
        <div class="tablas">
            {include file="eventos.tpl"}
            {include file="bandas.tpl"}
        </div>
    </form>

</div>
{include file="footer.tpl"}