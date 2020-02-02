<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style type="text/css">
      .container-fluid {
    background-color: beige;
}
  </style>
</head>
<body>



<div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 leftside">
          
    </div>
    <div class="col-sm-10 rightside">
        
     <h2>Update Form</h2>
 <div class="flash-message">
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
         @if(Session::has('alert-' . $msg))

           <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
           </p>
         @endif
      @endforeach
   


      <form class="form-horizontal" action="{{URL('/updatedata')}}" method="post" enctype="multipart/form-data" >
        @csrf
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-6 col-sm-offset-1">
        <input type="text" class="form-control" id="name" placeholder="Enter Your Name" name="name" onkeypress="return /[a-z ]/i.test(event.key)" value="{{$data['name']}}" required >
      </div>
    </div>

<input type="hidden" name="user_id" value="{{$data['id']}} ">

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Last Name:</label>
      <div class="col-sm-6 col-sm-offset-1">
        <input type="text" class="form-control" id="lname" placeholder="Enter Your last name" name="lname" onkeypress="return /[a-z ]/i.test(event.key)" value="{{$data['lname']}}" required >
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Mobile:</label>
      <div class="col-sm-6 col-sm-offset-1">
        <input type="text" class="form-control" id="mobile" placeholder="Enter Your Number" name="mobile" onkeypress="return /[0-9]/i.test(event.key)" value="{{$data['mobile']}}" required>
     </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-6 col-sm-offset-1">
        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email" value="{{$data['email']}}" required >
      </div>
    </div>

<div class="form-group">
      <label class="control-label col-sm-2" for="email">Image:</label>
      <div class="col-sm-6 col-sm-offset-1">
        <input type="file" class="form-control" id="file" name="image" >
      </div>
    </div>

    <div class="form-group">
            <label class="control-label col-sm-2" for="email">Old Image:</label>
                  <div class="col-sm-6 col-sm-offset-1">
                  <img src="{{asset('/uploads/'.$data['image'] ) }}" height="100px" width="100px" />
                </div>
    </div>

  <div class="form-group">        
      <div class="text-center">
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </form>

</div>
   </div>
  </div>
</div>

</body>
</html>