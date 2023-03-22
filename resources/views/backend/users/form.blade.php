@csrf

<div class="form-group row">
    <label class="col-lg-3 col-form-label">Name</label>
    <div class="col-lg-9">
        <input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}">
    </div>
    <p @error('name') class="error" @enderror>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
    </p>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Email</label>
    <div class="col-lg-9">
        <input type="email" class="form-control" name="email" value="{{ $user->email ?? old('email') }}">
    </div>
    <p @error('email') class="error" @enderror>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </p>
</div>
<div class="form-group row">
    <label class="col-lg-3 col-form-label">Password</label>
    <div class="col-lg-9">
        <input type="password" class="form-control" name="password">
    </div>
    <p @error('password') class="error" @enderror>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </p>
</div>
<div class="text-end">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
