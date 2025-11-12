<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Department</title>
  </head>
  <body>
    <div class="container">
        <h1>Add Department</h1>
        <form method="POST" action="{{ route('departamentos.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Department</label>
                <input type="text" required class="form-control" id="name" placeholder="Department name" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="pais" class="form-label">País</label>
                <select class="form-select" id="pais" name="pais_codi" required>
                    <option selected disabled value="">Elegir...</option>
                    @foreach ($paises as $pais)
                        <option value="{{ $pais->pais_codi }}">{{ $pais->pais_nomb }}</option>
                    @endforeach
                </select>
                @error('pais_codi')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('departamentos.index') }}" class="btn btn-warning">Cancel</a> 
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>