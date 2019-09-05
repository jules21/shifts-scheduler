
    <div class="form-group">
<label for="email">E-mail</label>
<input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $edit ? $user->email : '' }}">

@error('email')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

</div>
<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control  @error('Username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ $edit ? $user->username : '' }}">

@error('Username')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror

</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password"
@if ($edit) placeholder="Leave blank if you don't want to change it" @endif
>
@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
<div class="form-group">
<label for="password_confirmation">Confirm password</label>
<input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
@if ($edit) placeholder="Leave blank if you don't want to change it" @endif
>
</div>
