<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Department</title>
  </head>
  <body>
    <div class="container">
        <h1>Edit Department</h1>
        <form method="POST" action="{{ route('departamentos.update', ['departamento' => $departamento]) }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="codigo" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id" disabled="disabled" value="{{ $departamento->depa_codi }}">
                <div id="codigoHelp" class="form-text">Department Id.</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Department</label>
                <input type="text" required class="form-control" id="depa_nomb" placeholder="Department name" name="name" value="{{ $departamento->depa_nomb }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <select class="form-select" id="pais" name="pais_codi" required>
                    <option selected disabled value="">Elegir...</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->pais_codi }}" @if($pais->pais_codi == $departamento->pais_codi) selected @endif>
                            {{ $pais->pais_nomb }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('departamentos.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>