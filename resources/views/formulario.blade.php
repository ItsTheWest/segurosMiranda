<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Formulario</h1>

        @if(session('success'))

            <script>
                // Si prefieres también la alerta emergente:
                document.addEventListener('DOMContentLoaded', function() {
                    alert("{{ session('success') }}");
                });
            </script>
        @endif

        <form id="miFormulario" method="POST" action="{{ route('submit.form') }}">
            @csrf
            <div class="mb-3">
                <label for="cedula" class="form-label">Cédula</label>
                <input type="text" required class="form-control" id="cedula" name="cedula"
                    placeholder="Ingrese su cédula">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" required class="form-control" id="nombre" name="nombre"
                    placeholder="Ingrese su nombre">
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" required class="form-control" id="apellido" name="apellido"
                    placeholder="Ingrese su apellido">
            </div>
            <div class="mb-3">
                <label for="sexo" class="form-label">Sexo</label>
                <select required class="form-select" id="sexo" name="sexo">
                    <option value="" selected>Seleccione su sexo</option>
                    <option value="masculino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ramo" class="form-label">Ramo</label>
                <select class="form-select" id="ramo" name="ramo">
                    <option value="" selected>Seleccione un ramo</option>
                    <option value="Persona">Persona</option>
                    <option value="automovil">Automóvil</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" name="nacimiento" id="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
        <div class="mt-3">
            <a href="{{ route('ver.lista') }}" class="btn btn-secondary">Ver Lista</a>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @vite(['resources/js/app.js'])
</body>

</html>