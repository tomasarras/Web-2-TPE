{literal}
<section id="vue-comentarios">

<!-- Contenedor Principal -->
	<div class="comments-container">
		<h1>Comentarios</h1>

		<ul id="comments-list" class="comments-list">
            <li v-if="user.logueado == 1">
            
                <div class="comment-main-level">
                    <!-- Avatar -->
                    <div class="comment-avatar"><img src="images/avatar.png" alt="avatar"></div>
                    <!-- Contenedor del Comentario -->
                    <div class="comment-box">
                        <div class="comment-head">
                            <h6 class="comment-name" v-bind:class="{ 'by-author': user.admin == 1 }">{{user.email}}</h6>
                            <!-- Estrellas -->

                            <div class="flex-end">

                                <div class="rating-comment">
                                    <div class="rating-num">0</div>
                                    <input class="rating-star" type="radio" id="star5" name="star" value="5">
                                    <label for="star5"></label>
                                    <input class="rating-star" type="radio" id="star4" name="star" value="4">
                                    <label for="star4"></label>
                                    <input class="rating-star" type="radio" id="star3" name="star" value="3">
                                    <label for="star3"></label>
                                    <input class="rating-star" type="radio" id="star2" name="star" value="2">
                                    <label for="star2"></label>
                                    <input class="rating-star" type="radio" id="star1" name="star" value="1">
                                    <label for="star1"></label>
                                </div>

                            </div>

                        </div>


                        <textarea name="" id="js-comentario" cols="30" rows="3" placeholder="Agregar comentario..."></textarea>

                        <button class="btn btn-primary ancho" id="btn-enviar-comentario">Enviar</button>
                    </div>
                </div>
            </li>

			<li v-for="comentario in comentarios">
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="images/avatar.png" alt="avatar"></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name" v-bind:class="{ 'by-author': comentario.admin == 1 }">{{comentario.email}}</h6>
                            <!-- Estrellas -->

                            <div class="flex-end">
                                
                                <div class="rating" v-bind:class="{ 
                                    'background-verde-oscuro': comentario.puntaje == 5,
                                    'background-verde': comentario.puntaje == 4,
                                    'background-amarillo': comentario.puntaje == 3,
                                    'background-naranja': comentario.puntaje == 2,
                                    'background-rojo': comentario.puntaje == 1,}">

                                    <div class="rating-num">{{comentario.puntaje}}</div>
                                    <label v-bind:class="{ marcada: comentario.puntaje == 5 }"></label>
                                    <label v-bind:class="{ marcada: comentario.puntaje >= 4 }"></label>
                                    <label v-bind:class="{ marcada: comentario.puntaje >= 3 }"></label>
                                    <label v-bind:class="{ marcada: comentario.puntaje >= 2 }"></label>
                                    <label v-bind:class="{ marcada: comentario.puntaje >= 1 }"></label>
                                </div>

                                <a v-if="user.admin == 1" href="javascript:void(0);" class="btns-abrir-popup" :name="comentario.id_comentario">
                                   <i class="fa fa-trash-o rojo icono" id="rojo"></i>
                                </a>

                            </div>
						</div>
						<div class="comment-content">
							{{comentario.comentario}}
						</div>
					</div>
				</div>
			</li>
		</ul>
        
	</div>






    

<!-- popup -->
<div id="overlay" class="overlay">
    <div id="popup" class="popup">
        
        <div class="flex-end">
            <a href="javascript:void(0);" id="btn-cerrar-popup" class="btn-cerrar-popup js-cerrar">
                <i class="fa fa-times"></i>
            </a>
        </div>
        
        <h5>
            Seguro queres borrar el comentario de: <span id="js-nombre-evento"></span>?
        </h5>

        
        <button class="btn btn-danger" id="btn-borrar">Borrar</button>
        <button class="btn btn-primary js-cerrar">Cancelar</button>
        
    </div>	
</div>

    <script type="application/javascript" src="./js/comentarios.js"></script>

</section>
{/literal}