<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Change password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

</head>
<body>
    

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif

<div class="page-wrapper" style="margin-left:35%; margin-top: 5%">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-xl-10 d-flex">
                <div class="card flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.password') }}" method="post">
                        @csrf
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Old password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" name="old_password">
                                </div>
                                <p @error('old_password') class="error" @enderror>
                                    @error('old_password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">New password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" name="new_password">
                                </div>
                                <p @error('new_password') class="error" @enderror>
                                    @error('new_password')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label">Confirm new password</label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" name="new_password_confirmation">
                                </div>
                                <p @error('new_password_confirmation') class="error" @enderror>
                                    @error('new_password_confirmation')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </p>
                            </div>
                        
                            <div class="text-end">
                                <button style="margin: 0 auto" type="submit" class="btn btn-primary">Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 5%"><a href="{{ route('users.index') }}">Return home page</a></div>
</div>


</body>
</html>