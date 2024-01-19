<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @section('content')
    <h2>Sanatçı Düzenle</h2>

    <form method="post" action="{{ route('artists.update', ['artist' => $artist->id]) }}">
        @csrf
        @method('PUT')

        <label for="name">İsim:</label>
        <input type="text" name="name" value="{{ $artist->name }}" required>

        <label for="country">Ülke:</label>
        <input type="text" name="country" value="{{ $artist->country }}" required>

        <label for="birth_date">Doğum Tarihi:</label>
        <input type="date" name="birth_date" value="{{ $artist->birth_date }}" required>

        <label for="genre">Tür:</label>
        <input type="text" name="genre" value="{{ $artist->genre }}" required>

        <button type="submit">Güncelle</button>
    </form>
@endsection
</body>
</html>