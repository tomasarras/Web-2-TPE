<div class="blog container mb-5">
            <table>
                <thead>
                    <tr>
                        <th>Banda</th>
                        <th>Ultimo Concierto</th>
                        <th>Ultimo Disco</th>
                        <th>Completada</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
            </table>
            <div class="container">
                <form method="POST" action="agregar">
                    <h2>Formulario</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre de la banda</label>
                        <input type="text" class="form-control" name="nombre_form" placeholder="Nombre de la banda">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ultimo Concierto</label>
                        <input type="text" class="form-control" name="ultimoconcierto_form"
                            placeholder="Ultimo Concierto">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ultimo Disco</label>
                        <input type="text" class="form-control" name="ultimodisco_form" placeholder="Ultimo Disco">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" name="completado_form">
                        <label class="form-check-label" for="exampleCheck1">Completado</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Banda</button>
                </form>

            </div>
            <div class="col-3"></div>
        </div>
        </div>