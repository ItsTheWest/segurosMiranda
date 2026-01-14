<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif
    <div class="container-fluid py-4">

        <div class="alert alert-info d-flex align-items-center mb-3" role="alert">
            <i class="bi bi-info-circle me-2"></i>
            <div>
                Total de registros: <strong>{{ $personas->count() }}</strong>
            </div>
        </div>
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0" id="personasTable">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">CI</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Edad Actual</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Numero de contrato</th>
                                <th scope="col" class="text-center">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($personas as $persona)
                                <tr>
                                    <td>{{ $persona->id }}</td>
                                    <td><strong>{{$persona->CI}}</strong></td>
                                    <td>{{ $persona->nombre }}</td>
                                    <td>{{ $persona->apellido }}</td>
                                    <td>{{ \Carbon\Carbon::parse($persona->nacimiento)->format('d/m/Y') }}</td>
                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ \Carbon\Carbon::parse($persona->nacimiento)->age }} años
                                        </span>
                                    </td>
                                    <td>
                                        @if(strtolower($persona->sexo) == 'masculino')
                                            <span class="badge bg-primary">
                                                <i class="bi bi-gender-male me-1"></i>{{ $persona->sexo }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                <i class="bi bi-gender-female me-1"></i>{{ $persona->sexo }}
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $persona->contrato ? $persona->contrato->numero : 'N/A' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#contratosModal"
                                            onclick="setPersona({{ $persona->id }}, '{{ $persona->contrato ? $persona->contrato->Nombre : '' }}', '{{ $persona->contrato ? $persona->contrato->numero : '' }}')">
                                            Asignar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-3">
        <a href="{{ route('formulario') }}" class="btn btn-secondary">Volver al Formulario</a>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="contratosModal" tabindex="-1" aria-labelledby="contratosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('asignar.contrato') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="contratosModalLabel">Nuevo Contrato</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="persona_id" id="persona_id_input">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Contrato</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="numero" class="form-label">Número de Contrato</label>
                            <input type="text" class="form-control" id="numero" name="numero" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function setPersona(id, nombre, numero) { // obtener el id de la persona que seleccione en la lista
            document.getElementById('persona_id_input').value = id;
            document.getElementById('nombre').value = nombre || '';
            document.getElementById('numero').value = numero || '';
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>