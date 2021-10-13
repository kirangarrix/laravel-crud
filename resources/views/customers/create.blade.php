<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>

    <div class="card-body">
        @if (count($errors)>0)
            <div class="alert alert-danger">
                @foreach ($errors->all() as $message )
                    {{ $message }}
                @endforeach
            </div>
        @endif

        @if ($message=Session::get('success'))
        <div class="alert alert-success alert-block">
            {{ $message }}
        </div>            
        @endif

    <form action="/customers" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">First Name</label>
          <input type="text" class="form-control" name="firstName">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Last Name</label>
          <input type="text" class="form-control" name="lastName">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Place</label>
          <input type="text" class="form-control" name="place">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</body>
</html>