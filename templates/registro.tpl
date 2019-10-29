{include file="html.tpl"}
{include file="header.tpl"}
<div class="centrar-contenido login">
    <section class="bg-dark borde grande">
        <form action="guardaUsuario" method="post">
            
            <div class="form-group">
                <label for="user" class="blanco">Email</label>
                <input type="text" name="user" class="form-control largo campo-vacio" id="user" aria-describedby="emailHelp" placeholder="Ingresa tu nombre de usuario">
                <div class="rojo oculto">Error, el nombre de usuario no puede quedar vacio</div>
            </div>

            <div class="form-group">
                <label for="password" class="blanco">Password</label>
                <input type="password" name="password" class="form-control largo campo-vacio" id="password" placeholder="Password">
                <div class="rojo oculto">Error, la contraseña no puede quedar vacia</div>
            </div>
            
            <div class="centrar-contenido">
                <button type="submit" class="btn btn-primary campos-vacios">Registrarse</button>
            </div>

            <div class="rojo">{$mensaje}</div>
        </form>  
    </section>
</div>
{include file="footer.tpl"}