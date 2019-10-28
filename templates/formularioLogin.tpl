<div class="centrado login">
    <section class="bg-dark borde grande centrado">
        <form action="login" method="post">
            
            <div class="form-group">
                <label for="usuario" class="blanco">Email</label>
                <input type="text" name="usuario" class="form-control largo" id="usuario" aria-describedby="emailHelp" placeholder="Ingresa tu nombre de usuario">
                <div id="error-usuario" class="rojo"></div>
            </div>
            
            <div class="form-group">
                <label for="password" class="blanco">Password</label>
                <input type="password" name="password" class="form-control largo" id="password" placeholder="Password">
                <div id="error-password" class="rojo"></div>
            </div>
            
            <div class="centrado">
                <button type="submit" class="btn btn-primary" id="btn-logueo">Login</button>
            </div>
        </form>  
    </section>
</div>