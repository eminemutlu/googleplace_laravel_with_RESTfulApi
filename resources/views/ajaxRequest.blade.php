<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">



    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    </head>
    <body>
        <div class="container">

           <nav class="navbar navbar-light bg-light justify-content-between">
              <a class="nav-link" href="{{ url('/home') }}/">Home</a>
            </nav>

            <form action="" id="formdata" class="form">
                <div class="form-group">
                    <label for="address">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">City</label>
                    <input type="text" id="city" name="city" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">State</label>
                    <input type="text" id="state" name="state" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Zip</label>
                    <input type="text" id="zip" name="zip" class="form-control">
                </div>
                <button type="button" class="submit btn btn-primary">Submit</button>
            </form>
            <table style="margin-top:15px;" class="table table-striped">
                <hr><b>Results</b></hr>
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">State</th>
                    <th scope="col">Zip</th>
                    <th scope="col">Latitude</th>
                    <th scope="col">Longitude</th>
                  </tr>
              </thead>
              <tbody class="results">

              </tbody>
            </table>
        </div>
    </body>

    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script>

        $.ajaxSetup({
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $(function(){

           $(".submit").click(function () {

                var data_ = $("#formdata").serialize();
  
                $.ajax({
                 type:'POST',
                 url: "{{ url('/ajaxRequest') }}",
                 data:data_,
                 success:function(dat){
                    
                    alert(dat.message);

                    switch (dat.success) {
                      case true:
                          var result = dat.data;
                          $(".result").html("");
                          
                          console.log(result);
                          console.log(result.name);

                             $('.results').html("<tr><td>"+result.name+"</td><td>"+result.address+"</td><td>"+result.city+"</td><td>"+result.state+"</td><td>"+result.zip+"</td><td>"+result.latitude+"</td><td>"+result.longitude+"</td></tr>");
                              
                          break;
                      case false:
                          $(".results").html("<tr><td>There are no results!</td></tr>");
                          break;
                  }

                 },
                 error: function(xhr, textStatus, errorThrown) {
          
                  console.log(xhr)
                  }

              });
           }) ;
        });

    </script>

</html>
