@extends('back.layouts.master')
@section('content')
<div class="main">
    <h3 class="pageHeader">
        NEW DOCTOR FORM
    </h3>
</div>

<div class="formContent">
    <span class="formHeader">
        <h4>ADD DOCTOR FORM</h4><br />
        fill in with correct informations
    </span>
    @if(Session::get('error'))
    <div class="alert alert-error">
        {{Session::get('error')}}
    </div>
    @endif
    @if(Session::get('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <hr />
    <form method="POST" action="{{ route('doctor.add') }}">
        @csrf
    
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
    
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>
        
            <div class="col-md-6">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                    value="{{ old('username') }}" required autocomplete="username" autofocus>
        
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">
    
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    
        <div class="form-group row">
            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
    
            <div class="col-md-6">
                <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                    value="{{ old('mobile') }}" required autocomplete="mobile">
    
                @error('mobile')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    
        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">
    
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    
        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
    
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row">
            <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>
        
            <div class="col-md-6">
                <select name="department_id" value="{{ old('department') }}">
                    @foreach($departments as $department)
                        <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                    @endforeach
                </select>
        
                @error('department')
                <span class="invalid-feedback" class="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Add Doctor') }}
                </button>
            </div>
        </div>
    </form>
    <!-- <form action="route('doctor.add')" method="post">

        <input type="text" placeholder='Name'>
        <input type="text" placeholder='Mobile'>
        <input type="text" placeholder='Email'>
        <input type="password" placeholder='Password'>
        <input type="text" placeholder='Role'><br />
        <button>Create</button>
    </form> -->
</div>
</div>
@endsection    