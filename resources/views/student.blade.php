<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
</head>
<body>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="studentsAddModel" tabindex="-1" role="dialog" aria-labelledby="studentsAddModel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h2>ADD form Using Laravel & AJAX</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

  <form id="addform" >
 @csrf
  <div class="modal-body">
    <div class="form-group">
      <label for="email">First Name:</label>
      <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
    </div>
    
    <div class="form-group">
      <label for="email">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
    </div>

    <div class="form-group">
      <label for="email">Course:</label>
      <input type="text" class="form-control" id="course" placeholder="Enter Course" name="course">
    </div>

    <div class="form-group">
      <label for="email">Section:</label>
      <input type="text" class="form-control" id="section" placeholder="Enter Section" name="section">
    </div>

<!--     <button type="submit" class="btn btn-default">Save Student Data</button>
-->
</div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Student Data</button>
      </div>
    </form>

  </div>
</div>
</div>

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentsAddModel">
  Launch demo modal
</button>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

<script type="text/javascript">
  $(document).ready(function (){
    alert("ready");

    $('#addform').on('submit',function(e){
      e.preventDefault();
        alert('btn');
      $.ajax({
        type: "POST",
        url: "{{URL('/studentadd')}}",
        data: $('#addform').serialize(),
         //alert('InAjax');
        success: function (response) {
          //alert('Response True');
          // console.log('response')

         $('#studentsAddModel').hide();
          alert("Data Saved");
        },
        error: function(error){
          console.log(error);
          alert("Data Not Saved");
        }

      });
    });
  });
</script>
</body>
</html>
