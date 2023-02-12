<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create  Profile</title>
</head>

<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="col-md-12 row">
        <div class="col-md-4"></div>
        <div class="col-md-4 mt-5">
            <div class="card bg-light">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('profile.store') }}"  enctype="multipart/form-data">
                        @method('POST')
                        @csrf

                        <!-- Email input -->
                        <div class="form-outline mb-4 hidden">
                            <input type="hidden" name="user_id" :value="{{$user->id}}"/>
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="first_name">First Name</label>
                            <input type="text" name="first_name" :value="old('first_name')" required autofocus id="first_name" class="form-control" />

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="lust_name">Lust Name</label>
                            <input type="text" name="lust_name" :value="old('lust_name')" required autofocus id="lust_name" class="form-control" />
                      
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" name="address" :value="old('address')" required autofocus id="address" class="form-control" />
                    
                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="image">Image</label>
                            <input type="file" name="image"  required class="form-control" />
                     
                        </div>

                        <!-- 2 column grid layout for inline styling -->

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary w-100 btn-block mb-4">Create Now</button>
                        <div class="row mb-4">
                            <div class="col d-flex justify-content-center">
                                <a href="{{route('dashboard')}}" class="btn w-50">Go Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>

</html>