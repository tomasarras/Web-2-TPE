{include file="header.tpl"}

<div class="centrar-contenido view">
    <section class="bg-dark borde grande">
        <form action="#" method="POST" id="form-registro">
            
            <div class="form-group">
                <label for="email" class="blanco">Email</label>
                <input type="email" name="email" class="form-control largo campo-vacio" id="email" aria-describedby="emailHelp" placeholder="Ingresa tu email">
                <div class="invalid-feedback">Error, el email no puede quedar vacio</div>
                <div id="email-existente" class="invalid none">El email ya existe, proba iniciando sesion</div>
            </div>


            <div class="form-group">
                <label for="user_name" class="blanco">Nombre de Usuario</label>
                <input type="text" name="user_name" id="user_name" class="form-control largo campo-vacio" placeholder="Nombre de usuario">
                <div class="invalid-feedback">Error, nombre de usuario no puede quedar vacio</div>
                <div id="usuario-existente" class="invalid none">El nombre de usuario ya esta en uso</div>
            </div>

            <div class="form-group">
                <label for="password-1" class="blanco">Contraseña</label>
                <input type="password" name="password-1" class="form-control largo campo-vacio" id="password-1" placeholder="Contraseña">
                <div class="invalid-feedback">Error, la contraseña no puede quedar vacia</div>
            </div>

            <div class="form-group">
                <label for="password-2" class="blanco">Confirmar Contraseña</label>
                <input type="password" name="password-2" class="form-control largo campo-vacio" id="password-2" placeholder="Confirmar contraseña">
                <div class="invalid-feedback">Volve a escribir la misma contraseña</div>
            </div>

            <div class="form-group">
                <label for="pregunta" class="blanco">Seleccione una pregunta de seguridad</label>
                <select class="form-control" name="preguntas" id="pregunta">
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

            <div class="centrar-contenido espacio-top">
                <button type="submit" class="btn btn-primary campos-vacios ancho" id="btn-registrarse">Registrarse</button>
            </div>

            <div class="rojo">{$mensaje}</div>
        </form>
    </section>
</div>

<script src="./js/crearUsuario.js"></script>

{include file="footer.tpl"}