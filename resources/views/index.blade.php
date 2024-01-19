<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
 
    <h2>Sanatçılar</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Ülke</th>
                <th>Doğum Tarihi</th>
                <th>Tür</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artists as $artist)
                <tr>
                    <td>{{ $artist->id }}</td>
                    <td>{{ $artist->name }}</td>
                    <td>{{ $artist->country }}</td>
                    <td>{{ $artist->birth_date }}</td>
                    <td>{{ $artist->genre }}</td>
                    <td>
                        <!-- Düzenleme bağlantısı -->
                        <a href="{{ route ('artists.edit', $artist->id) }}">Düzenle</a> |
                        <div class="col ">
                            <a class="btn btn-sm btn-success" href={{ route('artists.create') }}>Add artist</a>
                          </div>

                        <!-- Silme formu -->
                        <form method="post" action="{{ route('artists.destroy', ['artist' => $artist->id]) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Sanatçıyı silmek istediğinizden emin misiniz?')">Sil</button>
                        </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Albümler</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Yıl</th>
                <th>Tür</th>
                <th>Satış</th>
                <th>Dil</th>
                <th>Sanatçı</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <td>{{ $album->id }}</td>
                    <td>{{ $album->title }}</td>
                    <td>{{ $album->year }}</td>
                    <td>{{ $album->genre }}</td>
                    <td>{{ $album->sales }}</td>
                    <td>{{ $album->language }}</td>
                    <td>{{ $album->artist->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Şarkılar</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>İsim</th>
                <th>Süre</th>
                <th>Besteci</th>
                <th>Albüm</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song)
                <tr>
                    <td>{{ $song->id }}</td>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->duration }}</td>
                    <td>{{ $song->composer }}</td>
                    <td>{{ $song->album->title }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
</body>
</html>