<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  

        <title>Project Address</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        
    </head>
    <body>

        <div class="container">


          <nav class="navbar navbar-light bg-light justify-content-between">
            <a class="nav-link" href="{{ url('/ajaxRequest') }}">New Properties</a>
            <form class="form-inline"> 
              <input class="form-control mr-sm-2" name="keyword" id="keyword" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0 submit" type="button">Search</button>
            </form>
          </nav>

          
            <table class="table">
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
                  @foreach ($Address_->data as $value)
                    
                    <tr>
                      <td>{{ $value->name }}</td>
                      <td>{{ $value->address }}</td> 
                      <td>{{ $value->city }}</td>
                      <td>{{ $value->state }}</td> 
                      <td>{{ $value->zip }}</td> 
                      <td>{{ $value->latitude }}</td> 
                      <td>{{ $value->longitude }}</td>  
                    </tr>
                   
                  @endforeach

            </tbody>
            <table>
        </div>
    </body>

   

</html>


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

                var data_ = $("#keyword").serialize();

                $.ajax({
                 type:'GET',
                 dataType: 'json',
                 url: "{{ url('/search') }}",
                 data:data_,
                 success:function(dat){
    
                  
                    switch (dat.success) {
                      case true:
                          var result = dat.data;

                          $(".results").html("");
                        
                            for(var i = 0;i<result.length;i++){
                              $(".results").append("<tr><td>"+result[i].name+"</td><td>"+result[i].address+"</td><td>"+result[i].city+"</td><td>"+result[i].state+"</td><td>"+result[i].zip+"</td><td>"+result[i].latitude+"</td><td>"+result[i].longitude+"</td></tr>");
                            }

                          break;
                      case false:
                          $(".results").html("<tr><td>No results found!</td></tr>");
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