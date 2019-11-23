{include file="header.tpl"}

<div class="centrar-contenido view">
    <section class="bg-dark borde grande">
        <form action="login" method="POST">
            
            <div class="form-group">
                <label for="email-usuario" class="blanco">Nombre de usuario o email</label>
                <input type="text" name="email-usuario" class="form-control campo-vacio" id="email-usuario" placeholder="Ingresa tu nombre de usuario o email">
                <div class="invalid-feedback">Error, el nombre de usuario no puede quedar vacio</div>
            </div>
            
            <div class="form-group">
                <label for="password" class="blanco">Contraseña</label>
                <input type="password" name="password" class="form-control campo-vacio" id="password" placeholder="Contraseña">
                <div class="invalid-feedback">Error, la contraseña no puede quedar vacia</div>
            </div>
            
            <a href="login/restablecer-contraseña">Olvide mi contraseña</a>

            <div class="centrar-contenido margen-arriba">
                <button type="submit" class="btn btn-primary ancho campos-vacios">Login</button>
            </div>

            <div class="rojo centrar-contenido invalid">{$mensaje}</div>
        </form>  
    </section>
</div>
{include file="footer.tpl"}