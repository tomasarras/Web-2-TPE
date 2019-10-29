<div class="centrar-contenido login">
    <section class="bg-dark borde grande">
        <form action="login" method="post">
            
            <div class="form-group">
                <label for="usuario" class="blanco">Email</label>
                <input type="text" name="usuario" class="form-control largo campo-vacio" id="usuario" aria-describedby="emailHelp" placeholder="Ingresa tu nombre de usuario">
                <div class="rojo oculto">Error, el nombre de usuario no puede quedar vacio</div>
            </div>
            
            <div class="form-group">
                <label for="password" class="blanco">Password</label>
                <input type="password" name="password" class="form-control largo campo-vacio" id="password" placeholder="Password">
                <div class="rojo oculto">Error, la contraseña no puede quedar vacia</div>
            </div>
            
            <div class="centrar-contenido">
                <button type="submit" class="btn btn-primary campos-vacios">Login</button>
            </div>

            <div id="error" class="rojo centrar-contenido">{$mensaje}</div>
        </form>  
    </section>
</div>