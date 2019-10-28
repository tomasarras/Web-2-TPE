{include file="html.tpl"}
{include file="header.tpl"}
<div class="centrado login">
    <section class="bg-dark borde grande centrado">
        <form action="guardaUsuario" method="post">
            
            <div class="form-group">
                <label for="user" class="blanco">Email</label>
                <input type="text" name="user" class="form-control largo" id="usuario" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                <div id="error-usuario" class="rojo"></div>
            </div>

            <div class="form-group">
                <label for="password" class="blanco">Password</label>
                <input type="password" name="password" class="form-control largo" id="password" placeholder="Password">
                <div id="error-password" class="rojo"></div>
            </div>
            
            <div class="centrado">
                <button type="submit" class="btn btn-primary" id="btn-logueo">Registrarse</button>
            </div>
        </form>  
    </section>
</div>
{include file="footer.tpl"}