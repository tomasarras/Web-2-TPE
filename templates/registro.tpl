{include file="html.tpl"}
{include file="header.tpl"}
<div class="centrado login">
    <section class="bg-dark borde grande centrado">
        <form action="guardaUsuario" method="post">
            
            <div class="form-group">
                <label for="email" class="blanco">Email</label>
                <input type="text" name="user" class="form-control largo" id="email" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                <small id="emailHelp" class="form-text text-muted">No compartiremos tu email con nadie mas</small>
            <small id="emailHelp" class="text-danger">{$mensaje}</small>
                       </div>
            <div class="form-group">
                <label for="password" class="blanco">Password</label>
                <input type="password" name="password" class="form-control largo" id="password" placeholder="Password">
            </div>
            
            <div class="centrado">
                <button type="submit" class="btn btn-primary">Registrarse</button>
            </div>
        </form>  
    </section>
</div>
{include file="footer.tpl"}
