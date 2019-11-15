{literal}
    
<tbody id="tabla-bandas">
    <tr v-for="banda in bandas">
        <td>{{banda.banda}}</td>
        <td>{{banda.anio}}</td>
        <td>{{banda.cantidad_canciones}}</td>

        <td name="sin-evento" v-if="banda.evento == null">Ningun evento asignado</td>
        <td v-else>{{banda.evento}}</td>

        <td>
            <a v-bind:href="'admin/bandas/editar/' + banda.id_banda">
                <i class='far fa-edit icono'></i>
            </a>
        </td>

        <td v-if="banda.evento == null">
            <a href="javascript:void(0);" class="btns-abrir-popup" v-bind:name="banda.id_banda">
                <i class="fa fa-trash-o rojo icono"></i>
            </a>
        </td>

        <td v-else>No disponible</td>
    </tr>
</tbody>


<script src="./js/bandas.js"></script>
{/literal}