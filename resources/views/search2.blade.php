@extends('welcome')
@section('content')
@section('search')
<div>
        <h1>Hotels Avilable Price From: {{ $from }} To: {{ $to }}</h1>
</div>
@endsection

@foreach ($data as $p)
<div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  <div class="card-header">{{ $p['name'] }}</div>
  <div class="card-body">
    <h5 class="card-title">{{ $p['city'] }}</h5>
    <p class="card-text">{{ $p['price'] }}$ for 1 Night</p>
    <h3>Avilable At:</h3>
            <ul>
                @foreach ($p['availability'] as $v)
             <li> From  : {{ $v['from'] }}</li>
             <li> To : {{ $v['to'] }}</li>
             @endforeach
            </ul>
  </div>
</div>
@endforeach   
@endsection