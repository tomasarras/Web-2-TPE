{include file="header.tpl"}


<section id="employer-post-new-job">
	<div class="row">
		<div class="container">
	    	<div class="row">

                <div class="col-xs-10 col-xs-offset-1" id="container">
                    <div class="res-steps-container">
                        <div class="res-steps res-step-one active" data-class=".res-form-one">
                            <div class="res-step-bar">1</div>
                            <div class="res-progress-bar"></div>
                            <div class="res-progress-title">Ingresa tu email</div>
                        </div>
                        <div class="res-steps res-step-two" data-class=".res-form-two">
                            <div class="res-step-bar">2</div>
                            <div class="res-progress-bar"></div>
                            <div class="res-progress-title">Pregunta de seguridad</div>
                        </div>
                        <div class="res-steps res-step-three" data-class=".res-form-three">
                            <div class="res-step-bar">3</div>
                            <div class="res-progress-bar"></div>
                            <div class="res-progress-title">Nueva contraseña</div>
                        </div>
                        <div class="res-steps res-step-four" data-class=".res-form-four">
                            <div class="res-step-bar">4</div>
                            <div class="res-progress-bar"></div>
                            <div class="res-progress-title">Terminado</div>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>

                    <div class="res-step-form col-md-8 col-md-offset-2 res-form-one">
                        <h3 class="text-center">Ingresa tu email</h3>
                        <div class="form-horizontal">

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control largo" id="email" placeholder="Email">
                                <div class="invalid-feedback">El email no existe</div>
                            </div>

                            

                            <div class="form-group">
                                <div class="text-center">
                                    <button type="button" class="btn btn-default col-xs-offset-1 btn res-btn-orange" data-class=".res-form-one" value="email">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="res-step-form col-md-8 col-md-offset-2 res-form-two">
                        <h3 class="text-center">Responde a la pregunta de seguridad</h3>
                        <div class="form-horizontal">

                            {include file="vue/preguntaSeguridad.tpl"}

                            <div class="form-group">
                                <label for="respuesta">Respuesta</label>
                                <input type="text" class="form-control largo" id="respuesta" placeholder="Respuesta">
                                <div class="invalid-feedback">Respuesta invalida</div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button type="button" class="btn btn-default btn res-btn-gray" data-class=".res-form-two">Atras</button>
                                    <button type="button" class="btn btn-default col-xs-offset-1 btn res-btn-orange" data-class=".res-form-two" value="respuesta">Siguiente</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="res-step-form col-md-8 col-md-offset-2 res-form-three">
                        <h3 class="text-center">Ingresa una nueva contraseña</h3>
                        <form class="form-horizontal">



                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                    <input type="password" class="form-control largo" id="password" placeholder="Contraseña">
                                <div class="invalid-feedback">La contraseña no puede quedar vacia</div>
                            </div>

                            <div class="form-group">
                                <label for="password-2">Confirmar Contraseña</label>
                                <input type="password" name="password-2" class="form-control largo" id="password-2" placeholder="Confirmar contraseña">
                                <div class="invalid-feedback">Volve a escribir la misma contraseña</div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button type="button" class="btn btn-default btn res-btn-gray" data-class=".res-form-three">Atras</button>
                                    <button type="button" class="btn btn-default col-xs-offset-1 btn res-btn-orange" data-class=".res-form-three" value="password">Siguiente</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="res-step-form col-md-8 col-md-offset-2 res-form-four">
                        <h3 class="text-center">La contraseña se cambio</h3>
                        <form class="form-horizontal">

                            <a href="home">Volver al home</a>

                        </form>
                    </div>

                </div>
	        </div>
	    </div>
	</div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="./js/restablecerPassword.js"><script>

{include file="footer.tpl"}