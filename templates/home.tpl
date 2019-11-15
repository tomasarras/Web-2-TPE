{include file="header.tpl"}
{include file="correo.tpl"}

<div class="tablas"> <!-- filtro -->
    <form class="margen-abajo" action="filtrarEventos" method="POST">
        <div class="centrar-contenido blanco">
            <h4>Buscar evento por banda</h4> 
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-light" type="submit" name="button">Filtrar</button>
            </div>
            <select name = "banda" class="custom-select" >
                {foreach from=$bandas item=banda}
                    <option value="{$banda->id_banda}">{$banda->banda}</option>
                {/foreach}
            </select>
        </div>
    </form>


    <form method="POST" id="js-form-tablas">
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

        {include file="eventos.tpl"}
        {include file="bandas.tpl"}
    </form>

</div>

{include file="footer.tpl"}