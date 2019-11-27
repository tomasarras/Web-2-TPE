{literal}

<tbody id="vue-tabla-usuarios">
    <tr v-for="usuario in usuarios">

        <td v-bind:name="usuario.id_usuario" v-bind:class="{ resaltar: usuario.id_usuario == id_usuario }">
            {{usuario.nombre}}
        </td>

        <td v-bind:name="usuario.id_usuario" v-bind:class="{ resaltar: usuario.id_usuario == id_usuario }">
            {{usuario.email}}
        </td>

        <td v-if="usuario.id_usuario != id_usuario">
            <div class="toggle-btn" v-bind:class="{ active: usuario.admin == 1 }">
                <input type="checkbox" v-bind:checked="usuario.admin == 1" class="cb-value" v-bind:name="usuario.id_usuario"/>
                <span class="round-btn"></span>
            </div>
        </td>

        <td v-if="usuario.id_usuario == id_usuario">
            <div class="toggle-btn active">
                <input type="checkbox" checked class="cb-value not-link" v-bind:name="usuario.id_usuario"/>
                <span class="round-btn"></span>
            </div>
        </td>
        
        <td v-if="usuario.id_usuario == id_usuario">No disponible</td>

        <td v-if="usuario.id_usuario != id_usuario"> 
            <a href="javascript:void(0);" class="btns-abrir-popup" v-bind:name="usuario.id_usuario">
                <i class="fa fa-trash-o rojo icono"></i>
            </a>
        </td>
        
    </tr>
</tbody>

<script type="module" src="js/tablaUsuarios.js"></script>

{/literal}