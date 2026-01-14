<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Personas - Seguros Miranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>

<body class="bg-light">
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
                                    <th scope="col">Numero</th>
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
                                        <td>{{ $persona->numero ?? 'N/A' }}</td>
                                        <td>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>