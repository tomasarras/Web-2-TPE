{include file="header.tpl"}

<div class="centrar-contenido view">
    <section class="bg-dark borde grande">
        <form action="login" method="POST">
            
            <div class="form-group">
                <label for="email" class="blanco">Email</label>
                <input type="email" name="email" class="form-control largo campo-vacio" id="email" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                <div class="invalid-feedback">Error, el nombre de usuario no puede quedar vacio</div>
            </div>
            
            <div class="form-group">
                <label for="password" class="blanco">Contraseña</label>
                <input type="password" name="password" class="form-control largo campo-vacio" id="password" placeholder="Contraseña">
                <div class="invalid-feedback">Error, la contraseña no puede quedar vacia</div>
            </div>
            
            <a href="login/restablecer-contraseña">Olvide mi contraseña</a>

            <div class="centrar-contenido espacio-top">
                <button type="submit" class="btn btn-primary campos-vacios ancho">Login</button>
            </div>

            <div id="error" class="rojo centrar-contenido">{$mensaje}</div>
        </form>  
    </section>
</div>

{include file="footer.tpl"}