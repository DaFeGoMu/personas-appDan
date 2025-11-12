<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Departamentos</title>
  </head>
  <body>
    <div class="container">
        <h1>Listado de Departamentos</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <a href="{{ route('departamentos.create') }}" class="btn btn-success">Add</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Department</th>
                    <th scope="col">País</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departamentos as $departamento)
                <tr>
                    <th scope="row">{{ $departamento->depa_codi }}</th>
                    <td>{{ $departamento->depa_nomb }}</td>
                    <td>{{ optional($departamento->pais)->pais_nomb ?? 'País no asignado' }}</td>
                    <td>
                        <a href="{{ route('departamentos.edit', ['departamento' => $departamento]) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('departamentos.destroy', ['departamento' => $departamento]) }}" method='POST' style="display: inline-block" onsubmit="return confirm('¿Está seguro de que desea eliminar este departamento?');">
                            @method('delete')
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $departamentos->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>