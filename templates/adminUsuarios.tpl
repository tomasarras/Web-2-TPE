{include file="header.tpl"}
<link rel="stylesheet" href="css/adminUsuarios.css">

<section class="container margen-arriba margen-abajo">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Admin</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        {include file="vue/Usuarios.tpl"}
    </table>
</section>


<!-- popup -->
<div id="overlay" class="overlay">
    <div id="popup" class="popup">
        
        <div class="flex-end">
            <a href="javascript:void(0);" id="btn-cerrar-popup" class="btn-cerrar-popup js-cerrar">
                <i class="fa fa-times"></i>
            </a>
        </div>
        
        <h5>
            Seguro queres borrar al usuario: <span id="js-nombre-elemento"></span>?
        </h5>

        
        <a src="admin/usuarios/eliminar/" href="#" class="btn btn-danger" id="btn-borrar">Borrar</a>
        <button class="btn btn-primary js-cerrar">Cancelar</button>
        
    </div>	
</div>


{include file="footer.tpl"}