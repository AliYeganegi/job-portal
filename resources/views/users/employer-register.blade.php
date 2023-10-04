@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Looking for an employee?</h3>
                <h5>Please start by creating an account here</h5>
                <img class="mt-3" src="/images/start-here.png" alt="">
            </div>

            <div class="mt-5 col-md-6">
                <div class="card">
                    <div class="card-header">Employer Registeration</div>
                    <form action="{{route('store.employer')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mt-3 form-group">
                                <label for="">Company Name</label>
                                <input type="text" name="name" class="form-control">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mt-3 form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="mt-3 form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary mt-5" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
