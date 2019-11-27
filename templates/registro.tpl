{include file="header.tpl"}

<div class="centrar-contenido">
    <section class="bg-dark borde grande blanco margen-vertical">
        <form action="login" method="POST" id="form-registro">
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control campo-vacio" id="email" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                <div class="invalid-feedback">Error, el email no puede quedar vacio</div>
                <div id="email-existente" class="invalid none">El email ya existe, proba iniciando sesion</div>
            </div>


            <div class="form-group">
                <label for="user_name">Nombre de Usuario</label>
                <input type="text" name="user_name" id="user_name" class="form-control campo-vacio" placeholder="Nombre de usuario">
                <div class="invalid-feedback">Error, nombre de usuario no puede quedar vacio</div>
                <div id="usuario-existente" class="invalid none">El nombre de usuario ya esta en uso</div>
            </div>

            <input type="text" class="none" name="email-usuario" id="email-usuario">

            <div class="form-group">
                <label for="password-1">Contraseña</label>
                <input type="password" name="password" class="form-control campo-vacio" id="password-1" placeholder="Contraseña">
                <div class="invalid-feedback">Error, la contraseña no puede quedar vacia</div>
            </div>

            <div class="form-group">
                <label for="password-2">Confirmar Contraseña</label>
                <input type="password" name="password-2" class="form-control campo-vacio" id="password-2" placeholder="Confirmar contraseña">
                <div class="invalid-feedback">Volve a escribir la misma contraseña</div>
            </div>

            <div class="form-group">
                <label for="pregunta">Seleccione una pregunta de seguridad</label>
                <select class="form-control" name="pregunta" id="pregunta">
                    <option value="perro">Nombre de su primera mascota.</option>
                    <option value="apodo">Apodo de pequeño.</option>
                    <option value="escuela">Nombre de su escuela primaria.</option>
                    <option value="lugar">Lugar de nacimiento.</option>
                    <option value="apellido">Apellido de soltero de su madre.</option>
                </select>
            </div>

            <div class="form-group">
                <input type="text" class="form-control campo-vacio" placeholder="Repuesta" id="respuesta" name="respuesta">
                <div class="invalid-feedback">Escribi una respuesta para la pregunta de seguridad</div>
            </div>

            <div class="centrar-contenido margen-arriba">
                <button type="submit" class="btn btn-primary ancho" id="btn-registrarse">Registrarse</button>
            </div>

            <div class="rojo">{$mensaje}</div>
        </form>
    </section>
</div>

<script type="module" src="./js/crearUsuario.js"></script>

{include file="footer.tpl"}