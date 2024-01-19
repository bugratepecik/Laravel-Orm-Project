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
              
                <th>İsim</th>
                <th>Ülke</th>
                <th>Tür</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artists as $artist)
                <tr>
                    <form method="POST" action="{{ route('artist.update', ['id' => $artist->artist_id]) }}" style="display: inline-block">
                        @csrf
                        @method('PUT')
                      <th>  <input type="text" name="name" value="{{ $artist->name }}" required> </th>
                       <th> <input type="text" name="country" value="{{ $artist->country }}" required> </th>
                      <th>  <input type="text" name="genre" value="{{ $artist->genre }}" required> </th>
                      <th>  <button class="btn btn-warning" type="submit">Update artist </button></th>
                    </form>
                    
                    
                 <th>   <form method="POST" action="{{ route('artist.destroy', ['id' => $artist->artist_id]) }}" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure about deleting this task')" type="submit"> Delete</button>
                    </form> </th> 
                </tr>
            @endforeach
            <form method="POST">
                @csrf
                <tr>
                    <td><input type="text" placeholder="Sanatçının/Grubun ismi" name="name" required  class="form-control"></td>
                    <td><input type="text" placeholder="Ülke" name="country" required class="form-control"></td>
                    <td><input type="text" placeholder="müzik türü" name="genre" required class="form-control"></td>
                    <td colspan="2"><button class="btn btn-success" type="submit">Add</button></td>
                </tr>
            </form>
        </tbody>
    </table>

    <h2>Albümler</h2>
    <table class="table">
        <thead>
            
            <tr>
                <th>İsim</th>
                <th>Yıl</th>
                <th>Tür</th>
                <th>Dil</th>
                <th>Sanatçı</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
                <tr>
                    <form method="POST" action="{{ route('album.update', ['id' => $album->album_id]) }}" style="display: inline-block">
                        @csrf
                        @method('PUT')
                      <th>  <input type="text" name="name" value="{{ $album->name }}" required> </th>
                       <th> <input type="number" min="1400" max="2099" name="year" value="{{ $album->year }}" required> </th>
                      <th>  <input type="text" name="genre" value="{{ $album->genre }}" required> </th>
                      <th>  <input type="text" name="lang" value="{{ $album->lang }}" required> </th>
                      <th>
                        <select name="artist_id" required class="form-control">
                            <option value=""  disabled>artisti seç</option>
                            @foreach($artists as $artist)
                                <option value="{{ $artist->artist_id }}" {{ $artist->artist_id == $album->artist_id ? 'selected' : '' }}>{{ $artist->name }}</option>
                            @endforeach
                        </select>
                    </th>
                      <th>  <button class="btn btn-warning" type="submit" onclick="return ">Update album </button></th>
                    </form>
                    
                    
                 <th>   <form method="POST" action="{{ route('album.destroy', ['id' => $album->album_id]) }}" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure about deleting this task')" type="submit"> Delete</button>
                    </form> </th> 
                </tr>
              @endforeach
              <form method="POST" action="{{route('album.store')}}">
                @csrf
                <tr>
                    <td><input type="text" placeholder="albüm ismi" name="name" required class="form-control"></td>
                    <td><input type="number" min="1400" max="2099" step="1" name="year" placeholder="yıl" required class="form-control"></td>
                    <td><input type="text" placeholder="albüm türü" name="genre" required class="form-control"></td>
                    <td><input type="text" placeholder="albüm dili" name="lang" required class="form-control"></td>
                    <td>
                        <select name="artist_id" required class="form-control">
                            <option value="" selected disabled>artisti seç</option>
                            @foreach($artists as $artist)
                                <option value="{{ $artist->artist_id }}">{{ $artist->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td colspan="2"><button class="btn btn-success" type="submit">Add</button></td>
                </tr> </form>
        </tbody>
    </table>

    <h2>Şarkılar</h2>
    <table class="table">
        <thead>
            <tr>
                <th>İsim</th>
                <th>Süre</th>
                <th>Sanatçı</th>
                <th>Albüm</th>    
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($songs as $song)
                <tr>
                    <form method="POST" action="{{ route('song.update', ['id' => $song->song_id]) }}" style="display: inline-block">
                        @csrf
                        @method('PUT')
                      <th>  <input type="text" name="name" value="{{ $song->name }}" required> </th>
                       <th> <input type="time" min="00:00" max="23:59"  name="duration" value="{{ $song->duration }}" required> </th>
                      <th> <output> {{$song->album->artist->name}}</output>
                      </th>  
                       <th>
                        <select name="album_id" required class="form-control">
                            <option value=""  disabled>albümü seç</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->album_id }}" {{ $album->album_id == $song->album_id ? 'selected' : '' }}>{{ $album->name }}</option>
                            @endforeach
                        </select>
                    </th>
                      <th>  <button class="btn btn-warning" type="submit" onclick="return ">Update album </button></th>
                    </form>
                    
                    
                 <th>   <form method="POST" action="{{ route('album.destroy', ['id' => $album->album_id]) }}" style="display: inline-block">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" onclick="return confirm('Are you sure about deleting this task')" type="submit"> Delete</button>
                    </form> </th> 
                </tr>
              @endforeach
            <form method="POST" action="{{route('song.store')}}">
                @csrf
                <tr>
                    <td><input type="text" placeholder="Şarkı ismi" name="name" required class="form-control"></td>
                    <td><input type="time" min="00:00" max="23:59" name="duration" placeholder="Süresi" required class="form-control"></td>
                    <td>

                        <select name="album_id" required class="form-control">
                            <option value="" selected disabled>albümü seç</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->album_id }}">{{ $album->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td colspan="2"><button class="btn btn-success" type="submit">Add</button></td>
                </tr> </form>
        </tbody>
    </table>

</body>
</html>