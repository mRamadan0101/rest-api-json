@extends('welcome')
@section('search')
<div>
        <h1>Your Search For :{{$search}}</h1>
</div>
@endsection
@section('content')


<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">{{ $results['name'] }}</div>
  <div class="card-body">
    <h5 class="card-title">{{ $results['city'] }}</h5>
    <p class="card-text">{{ $results['price'] }}$ for 1 Night</p>
    <h3>Avilable At:</h3>
            <ul>
             @foreach ($results['availability'] as $v)
                <li> From  : {{ $v['from'] }}</li>
                <li> To : {{ $v['to'] }}</li>
             @endforeach
            </ul>
  </div>
</div>

@endsection