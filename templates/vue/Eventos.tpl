{literal}
<tbody id="tabla-eventos">
    <tr v-for="evento in eventos">
        <td :name="evento.id_evento">{{evento.evento}}</td>
        <td>{{evento.detalle}}</td>
        <td>{{evento.ciudad}}</td>
        <td :name="evento.id_banda">{{evento.banda}}</td>
        <td>
            <a :href="'admin/eventos/editar/' + evento.id_evento">
                <i class='far fa-edit icono-tabla icono'></i>
            </a>
        </td>
        <td>
            <a href="javascript:void(0);" class="btns-abrir-popup" :name="evento.id_evento">
                <i class="fa fa-trash-o rojo icono"></i>
            </a>
        </td>
    </tr>
</tbody>

<script type="module" src="./js/eventos.js"></script>
{/literal}