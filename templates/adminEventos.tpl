{include file="html.tpl" }
{include file="header.tpl" }


<div class="centrar-contenido margen-tabla-admin">
    <table class="tabla-noticias ancho">
        <thead>
            <tr>
                <td>Evento</td>
                <td>Detalle</td>
                <td>Banda asociada</td>
                <td>Editar</td>
                <td>Eliminar</td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$eventos item=evento}
                <tr>
                    <td name="{$evento->id}">{$evento->nombre}</td>
                    <td>{$evento->detalle}</td>
                    <td name="{$evento->id_banda}">{$evento->banda}</td>
                    <td>
                        <a href="admin/eventos/editar/{$evento->id}">
                            <i class='far fa-edit' style='font-size:24px'></i>
                        </a>
                    </td>
                    <td>
                        <a href="javascript:void(0);" class="btns-abrir-popup" name="{$evento->id}">
                            <i class="fa fa-trash-o rojo" style="font-size:24px"></i>
                        </a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>


<div id="overlay" class="overlay">
    <div id="popup" class="popup">
        
        <div class="flex-end">
            <a href="javascript:void(0);" id="btn-cerrar-popup" class="btn-cerrar-popup js-cerrar">
                <i class="fa fa-times"></i>
            </a>
        </div>
        
        <h5>
            Seguro queres borrar el evento: <span id="js-nombre-evento"></span>?
        </h5>

        
        <a src="admin/eventos/eliminar/" class="btn btn-danger" id="btn-borrar">Borrar</a>
        <button class="btn btn-primary js-cerrar">Cancelar</button>
        
    </div>	
</div>



<div id="overlay" class="overlay">
	<div id="popup" class="popup">
		<a href="javascript:void(0);" id="btn-cerrar-popup" class="btn-cerrar-popup">
			<i class="fa fa-times"></i>
		</a>
		
		<h3>
			Suscribete
		</h3>
		
		<h4>
			y recibe un cupón de descuento
		</h4>
		
		<form action="javascript:void(0);">
			<div class="contenedor-inputs">
				<input type="text" placeholder="Nombre">
				<input type="email" placeholder="Email">
			</div>
			
			<input type="submit" class="btn-submit" value="Suscribirse">
		</form>
	</div>	
</div>


<div class="centrar-contenido admin margen-abajo">
    
    <section class="bg-dark borde grande margen-abajo">

        <form action="admin/eventos" method="POST" id="btns-formulario">
            <div class="centrar-contenido">
                <h3 class="blanco" id="nombre-evento">Agregar</h3>
            </div>
                
            <div class="form-group">
                <label for="evento" class="blanco">Evento</label>
                <input type="text" name="evento" class="form-control largo campo-vacio" id="input-evento" placeholder="Nombre del evento">
                <div class="invalid-feedback">Ingresa un evento</div>
            </div>

            <div class="form-group">
                <label for="detalle" class="blanco">Detalle del evento</label>
                <input type="text" name="detalle" class="form-control largo campo-vacio" id="input-detalle" placeholder="Detalle del evento">
                <div id="error-cantidad" class="invalid-feedback">Ingresa un detalle del evento</div>
            </div>

            <div class="form-group">
                <select class="custom-select" name="id_banda" id="banda-asociada">
                    {foreach from=$bandas item=banda}
                        <option value="{$banda->id_banda}">{$banda->banda}</option>
                    {/foreach}
                </select>
            </div>

            <button type="submit" src="admin/eventos/agregar" class="btn btn-primary campos-vacios ancho margen-der btns-formulario">Agregar</button>
        </form>  
        
    </section>
</div>
{include file="footer.tpl" }