<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="col-10 mx-auto mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="float-start">Edit details</h3>
                <a href="{{ route('student.index')}}" class=" btn btn-outline-primary hover float-end">back </a>
            </div>

            <div class="card-body">

                <form action="{{Route('student.update',$student->id)}}" method="POST">
                    @csrf

                    <input type="text"  class="form-control mb-3" name="name" value="{{ $student->name}}" placeholder="enter your name" >
                    <input type="text"  class="form-control mb-3" name="roll" value="{{ $student->roll}}" placeholder="enter your roll" >
                    <input type="text"  class="form-control mb-3" name="reg" value="{{ $student->reg}}" placeholder="enter your reg" >
                    <input type="email" class="form-control mb-3" name="email" value="{{ $student->email}}" placeholder="enter your email" >
                    <input type="submit" class="btn btn-outline-danger w-100" value="update">
                </form>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
