<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <style>
      *{
          margin: 0 auto;
          box-sizing: border-box
      }
  </style>
  <body>
      @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
      @endif
    <form enctype="multipart/form-data" class="form-group mt-4" style="width:500px" method="post" action="{!!url('postDangky')!!}">
        {{ csrf_field() }}
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Name" require>
      <div style="color: red">{!!$errors -> first('name')!!}</div>
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" require>
      <div style="color: red">{!!$errors -> first('email')!!}</div>
      <label for="password">Password:</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Password" require>
      <div style="color: red">{!!$errors -> first('password')!!}</div>
      <label for="fImages">Upload File:</label>
      <input type="file" class="form-control" name="fImages" id="">
      <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>