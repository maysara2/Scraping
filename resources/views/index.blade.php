<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scraping in laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>

<div class="containaer">

    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5 wapper">
            @foreach ($data as $key=>$value )

            
                <div class="card text-center mt-4">
                    <h5 class="card-header">{{ $key }}</h5>
                    <div class="card-body">
                        <p class="card-text"> {{ $value }} </p>
                    </div>

                </div>
                @endforeach

            </div>
    </div>

</div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>