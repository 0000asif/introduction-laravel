<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="col-10 mx-auto mt-5">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    {{session('success')}}
                </div>


            @endif
            <div class="card-header">
                <h3 class="float-start">student details</h3>
                <a href="{{ route('student.create') }}" class=" btn btn-outline-primary hover float-end">add new </a>
            </div>

            <div class="card-body">
                <table class="table table-striped table-hover table-responsive">
                    <tr>
                        <th>S/l</th>
                        <th>name</th>
                        <th>roll</th>
                        <th>reg</th>
                        <th>email</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th>action</th>
                    </tr>
                    @foreach ($students as $key => $student)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <th>{{ $student->name }}</th>
                            <th>{{ $student->roll }}</th>
                             <th>{{ $student->reg }}</th>
                            <th>{{ $student->email }}</th>
                            <th>{{date('d-m-Y H:i A', strtotime($student->created_at))}}</th>
                            <th>{{($student->created_at==$student->updated_at) ? "N/A" : date('d-m-Y H:i A', strtotime($student->updated_at))}}</th>
                            <th>
                                <div class="btn-group" role="group">
                                    <a href="{{Route('student.edit',$student->id)}}" class="btn btn-info btn-sm hover">edit</a>
                                    <a href="{{Route('student.delete',$student->id)}}" class="btn btn-danger btn-sm hover">delete</a>
                                </div>
                            </th>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
