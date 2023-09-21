
<form method="post" action="{{ route('e.test') }}">
    @csrf
@foreach($other['branches'] as $job) <input type="checkbox" name="jobs[]" value="{{$job->name}}"/>{{$job->name}}

@endforeach
@foreach($other['departements'] as $job) <input type="checkbox" name="jobs[]" value="{{$job->name}}"/>{{$job->name}}

@endforeach
    <button type="submit">sda</button>

</form>
