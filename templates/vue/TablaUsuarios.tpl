{literal}
<div id="vue-tabla-usuarios"> 
    <tbody>
        <tr v-for="usuario in usuarios" id="vue-tabla-usuarios">
            <td>{{usuario.email}}</td>

            <td>
                <label class="switch">
                    <input type="checkbox" v-bind:checked="usuario.admin == 1">
                    <div>
                        <span class="switch-admin"></span>
                    </div>
                </label>
            </td>

            <td> 
                <a href="javascript:void(0);" class="btns-abrir-popup" v-bind:name="usuario.id_usuario">
                    <i class="fa fa-trash-o rojo icono"></i>
                </a>
            </td>
        </tr>
    </tbody>
</div>

{/literal}