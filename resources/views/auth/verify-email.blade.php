@extends('layouts.app')

@section('content')
    <div class="mt-5 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Email Verification</div>
                    <div class="card-body text-center">
                        Please verify your email that we sent you
                        <p class="mt-5">didn't recive an email?</p>
                        <form action="{{ route('verification.send') }}" method="post">
                            @csrf
                            <div class="mt-2 d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary form-group" type="submit">Resend email</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
