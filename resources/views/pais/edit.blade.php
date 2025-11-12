<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-t">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Country</title>
  </head>
  <body>
    <div class="container">
        <h1>Edit Country</h1>
        <form method="POST" action="{{ route('paises.update', ['paise' => $pais->pais_codi]) }}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" required class="form-control" id="code" name="code" placeholder="Country Code" value="{{ $pais->pais_codi }}" disabled>
                <div id="codeHelp" class="form-text">3-letter country code. Cannot be changed.</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Country</label>
                <input type="text" required class="form-control" id="name" placeholder="Country name" name="name" value="{{ $pais->pais_nomb }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="capital" class="form-label">Capital</label>
                <input type="text" required class="form-control" id="capital" placeholder="Capital code" name="capital" value="{{ $pais->pais_capi }}">
            </div>
            @error('capital')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('paises.index') }}" class="btn btn-warning">Cancel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>