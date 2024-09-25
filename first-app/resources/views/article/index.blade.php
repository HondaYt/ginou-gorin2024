<h1>{{$title}}</h1>
@foreach ($json as $response)
<p>{{$response['name']}}</p>
@endforeach