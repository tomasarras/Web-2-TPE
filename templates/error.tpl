{include file="html.tpl"}

<div class="view">

    <div class="face err">
        <div class="band err">
            <div class="red err"></div>
            <div class="white err"></div>
            <div class="blue err"></div>
        </div>
        <div class="eyes err"></div>
        <div class="dimples err"></div>
        <div class="mouth err"></div>
    </div>

    <h1 class="error-404 err">Oops! algo salio mal!</h1>
    <h1 class="error-404 err">{$mensaje}</h1>

    <div class="centrar-contenido">
        <a class="btn btn-primary err" href="{$home}">Volver al Home</a>
    </div>
</div>
{include file="footer.tpl"}