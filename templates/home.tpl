{include file="html.tpl"}
{include file="header.tpl"}
{include file="correo.tpl"}
<div class="tablas">
    <form method="GET" id="js-form-tablas">
        <input class="none" name="eventos"
        {if $ordenEvento}
            value="{$ordenEvento}">
        {else}
            value="nombre">
        {/if}

        <input class="none" name="bandas"
        {if $ordenBanda}
            value="{$ordenBanda}">
        {else}
            value="banda">
        {/if}

        {include file="eventos.tpl"}
        {include file="bandas.tpl"}
    </form>
</div>
{include file="footer.tpl"}