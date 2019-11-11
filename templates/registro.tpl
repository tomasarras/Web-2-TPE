{include file="header.tpl"}

<div class="centrar-contenido view">
    <section class="bg-dark borde grande">
        <form action="registrarse" method="post">
            
            <div class="form-group">
                <label for="user" class="blanco">Email</label>
                <input type="email" name="user" class="form-control largo campo-vacio" id="user" aria-describedby="emailHelp" placeholder="Ingresa tu nombre de usuario">
                <div class="invalid-feedback">Error, el nombre de usuario no puede quedar vacio</div>
            </div>

            <div class="form-group">
                <label for="password" class="blanco">Contraseña</label>
                <input type="password" name="password" class="form-control largo campo-vacio" id="password" placeholder="Contraseña">
                <div class="invalid-feedback">Error, la contraseña no puede quedar vacia</div>
            </div>

            <a href="#">Olvide mi email/contraseña</a>
            
            
            <div class="centrar-contenido espacio-top">
                <button type="submit" class="btn btn-primary campos-vacios">Registrarse</button>
            </div>

            <div class="rojo">{$mensaje}</div>
        </form>  
    </section>
</div>

{include file="footer.tpl"}