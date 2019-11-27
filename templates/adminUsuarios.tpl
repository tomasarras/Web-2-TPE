{include file="header.tpl"}
<link rel="stylesheet" href="css/adminUsuarios.css">

<section class="container margen-arriba margen-abajo">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Admin</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$usuarios item=usuario}
            <tr name="{$usuario->id_usuario}" class="ids_usuarios">
                <td><!--agregar resaltado-->
                    {$usuario->nombre}
                </td>

                <td> <!--resaltar-->
                    {$usuario->email}
                </td>

                <td>
                    <div class="toggle-btn {if $usuario->admin eq '1'}active{/if}">
                        <input type="checkbox" {if $usuario->admin eq '1'}checked{/if} class="cb-value" name="{$usuario->id_usuario}"/>
                        <a href="admin/usuarios/cambiar-admin/{$usuario->id_usuario}">
                            <span class="round-btn"></span>
                        </a>
                    </div>
                </td>

                <td class="none">No disponible</td>

                <td> <!--desactivar-->
                    <a href="javascript:void(0);" class="btns-abrir-popup" name="{$usuario->id_usuario}">
                        <i class="fa fa-trash-o rojo icono"></i>
                    </a>
                </td>
                
            </tr>
            {/foreach}
        </tbody>
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

        
        <a src="admin/usuarios/eliminar/" class="btn btn-danger link" id="btn-borrar">Borrar</a>
        <button class="btn btn-primary js-cerrar">Cancelar</button>
        
    </div>	
</div>

<script type="module" src="js/tablaUsuarios.js"></script>


{include file="footer.tpl"}