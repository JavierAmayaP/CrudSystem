<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Crud System</title>
</head>

<body>
    <h1 class="text-md-center">CRUD SYSTEM</h1>
    <hr>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card shadow-lg mb-4 border-0">
                    <div class="car-card-body">
                        <!-- $errors is a global variable of laravel which save all errors-->
                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            - {{ $error }} <br>
                            @endforeach
                        </div>
                        @endif
                        <form action="{{ route('users.store')}}" method="POST">
                            <div class="form-row">
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                                </div>
                                <div class="col-sm-4">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                </div>
                                <div class="col-sm-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div clas="col-auto">
                                    @csrf
                                    <!-- We cen use button and input to send information using post -->
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table table-hover table-responsive-md">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Foreach bucle is used to repeating an instruction n times -->
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <!-- When we work with infromation wich is going to change database status we must use forms -->
                            <td>
                                <form action="{{ route('users.destroy', $user) }}" method="POST">
                                    @method('DELETE')
                                    @csrf()
                                    <input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure delete {{$user->name}}?')">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>