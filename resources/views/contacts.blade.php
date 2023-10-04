<h1>My Contacts</h1>


@foreach ($contacts as $contact)
    <ul>
        <p>{{$contact->name}}</p>
    </ul>
@endforeach