{include file="header.tpl"}
<link rel="stylesheet" href="css/restablecerPassword.css">

<section class="container">
    <div class="flex-center margen-arriba">
        <div class="tabsModule borde">
            <div class="tabs">
                <div class="tab active">Email</div>
                <div class="tab"       >Pregunta</div>
                <div class="tab"       >Contraseña</div>
                <div class="tab"       >Finalizar</div>
            </div>
            <div class="tabSlider">
                <div class="bar"></div>
            </div>
            <div class="sections">

                <div class="section active">
                    <div class="content">
                        <h3>Ingresa tu email</h3>
                        <p>Ingresa el email con el cual te registraste</p>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Email">
                            <div class="invalid-feedback">El email no existe</div>
                        </div>

                        <button name="1" class="btn btn-primary ancho" value="email">Siguiente</button>

                    </div>
                </div>

                <div class="section">
                    <div class="content">
                        <h3 class="margen-abajo">Pregunta de seguridad</h3>
                        <p>Responde a la pregunta que elegiste cuando te registraste.</p>

                        {include file="vue/preguntaSeguridad.tpl"}

                        <div class="form-group">
                            <label for="respuesta">Respuesta</label>
                            <input type="text" class="form-control" id="respuesta" placeholder="Respuesta">
                            <div class="invalid-feedback">Respuesta invalida</div>
                        </div>

                        <div class="flex-center">
                            <button name="2" class="btn btn-primary margen-der ancho" value="back">Atras</button>
                            <button name="2" class="btn btn-primary margen-izq ancho" value="respuesta">Siguiente</button>
                        </div>
                    </div>
                </div>
                
                <div class="section">
                    <div class="content">
                        <h3>Elige una nueva contraseña</h3>

                        <div class="form-group">
                                <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" id="password" placeholder="Contraseña">
                                <div class="invalid-feedback">La contraseña no puede quedar vacia</div>
                            </div>

                            <div class="form-group">
                                <label for="password-2">Confirmar Contraseña</label>
                                <input type="password" name="password-2" class="form-control" id="password-2" placeholder="Confirmar contraseña">
                                <div class="invalid-feedback">Volve a escribir la misma contraseña</div>
                            </div>

                        <div class="flex-center">
                            <button name="3" class="btn btn-primary margen-der ancho" value="back">Atras</button>
                            <button name="3" class="btn btn-primary margen-izq ancho" value="password">Siguiente</button>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="content">
                        <h3>Se cambio la contraseña</h3>
                        <p>Inicia sesion con la nueva contraseña.</p>
                        <a href="login" class="btn btn-primary ancho">Iniciar sesion</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script src="./js/restablecerPassword.js"><script>
{include file="footer.tpl"}
