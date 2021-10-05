<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
<div class="container-sm">
    <form action="{{ route('admin.store', ['model' => $modelAlias]) }}" method="post">
        @csrf
        @foreach($attributes as $attribute)
            <div class="form-floating mb-3">
                <input class="form-control" id="{{ $attribute }}" name="{{ $attribute }}" type="text" value="{{old($attribute)}}">
                <label for="{{$attribute}}">{{ $attribute }}</label>
                @error($attribute)
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        @endforeach
        <button class="btn btn-dark" type="submit">Add</button>
    </form>
</body>
</html>
