<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="_token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <title>Create</title>
</head>
<body>
  @foreach ($artists as $artist)
    <div class="container h-100 mt-5">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-10 col-md-8 col-lg-6">
            <h3>Add a Artist</h3>
            <form action="{{ route('artists.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="ad">Artist ismi</label>
                <input type="text" class="form-control" value="{{$artist->ad}}" id="ad" name="ad" required>
              </div>
              <div class="form-group">
                <label for="soyad">artistin varsa soyadı</label>
                <input type="text" class="form-control" value="{{$artist->soyad}}"  id="soyad" name="soyad"  >
              </div>
            <div class="form-group">
              <label for="ulke">Ülkesi</label>
              <input type="text" class="form-control" id="ulke" value="{{$artist->ulke}}" name="ulke" required>
            </div>
            <div class="form-group">
                <label for="dogum-tarihi">grubun kuruluş yılı veya artistin doğum günü</label>
                <input type="date" class="form-control" id="body" value="{{$artist->dogum_tarihi}}" name="body">
              </div> 
              <div class="form-group">
                <label for="tür">çaldığı tür</label>
                <input type="text" class="form-control" id="tür" name="tür" required>
              </div>
            

            </form>
          </div>
        </div>
      </div>
      @endforeach
</body>
</html>