@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Looking for a job?</h3>
                <img class="mt-3" src="/images/start-here.png" alt="">
            </div>

            <div class="mt-5 col-md-6">
                <div class="card" id="card">
                    <div class="card-header">Register</div>
                    <form action="#" method="post" id="registrationForm">
                        @csrf
                        <div class="card-body">
                            <div class="mt-3 form-group">
                                <label for="">Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                                @if($errors->has('name'))
                                <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                            <div class="mt-3 form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control" required>
                                @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                                @endif
                            </div>
                            <div class="mt-3 form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" required>
                                @if($errors->has('password'))
                                <span class="text-danger">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary mt-5" id="btnRegister">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="message"></div>
            </div>
        </div>
    </div>

    <script>
        var url = "{{ route('store.seeker') }}";
        document.getElementById("btnRegister").addEventListener("click", function(event) {
            var form = document.getElementById("registrationForm");
            var card = document.getElementById("card");
            var messageDiv = document.getElementById('message')
            messageDiv.innerHTML = ''
            var formData = new FormData(form)

            var button = event.target
            button.disabled = true;
            button.innerHTML = 'Sending email.... '

            fetch(url, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            }).then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Errror('Error')
                }
            }).then(data => {
                button.innerHTML = 'Register'
                button.disabled = false
                messageDiv.innerHTML =
                    '<div class="alert alert-success">Registration was successful.Please check your email to verify it</div>'
                card.style.display = 'none'
            }).catch(error => {
                button.innerHTML = 'Register'
                button.disabled = false
                messageDiv.innerHTML =
                    '<div class="alert alert-danger">Something went wrong. Please try again</div>'

            })


        })
    </script>
@endsection
