<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body class="container pt-5">

    <a href="{{route('dashboard')}}" class="text-right btn btn-info">Go Back</a>



    <div class="col-md-12 row p-5">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            <div class="card rounded" style="background-color: lightblue;">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/profiles/' . $user->profile->image	) }}" height="200" class="rounded-circle" alt="">
                    <div class="card rounded">
                        <div class="card-body">
                            <h4>Full Name: {{$user->profile->first_name}} {{ $user->profile->lust_name}}</h4>
                            <p>Email Address : {{$user->email}}</p>
                            <p>Address : {{$user->profile->address}}</p>
                            <p>Created At : {{$user->profile->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('/public/upload/images/')}}.{{$user->profile->image}}" alt="">

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>

</html>