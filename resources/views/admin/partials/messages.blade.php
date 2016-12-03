@if ($errors->any())
    <div class="alert alert-danger" role="alert" style="padding: 10px;margin-bottom: 10px;">
        <p>Something went wrong:</p>
        <ul style="padding-left: 17px;">
        @foreach($errors->all()as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif