@extends('welcome')
@section('search')
<div>
        <h1>Find Your Hotel</h1>
</div>
<form method="post" action="/">
  {{ csrf_field() }}
  <select name="prasort">
    <option>name</option>
    <option>price</option>
  </select>
<button type="submit" class="btn btn-primary">Sort</button>
</form>
<form method="get" action="{{ route('search') }}">
      <div class="well">
          <div class="input-group">
             <label for="search" class="col-2 col-form-label">Hotel Name Or City :</label>
              <input type="text" pattern="[A-Za-z ]{1,15}" class="form-control col-2" name="search">
       <button type="submit" class="btn btn-primary">Search</button>
           </div>
       </div> 

</form>
<br>
<form method="get" action="{{ route('search2') }}">
      <div class="well">
          <div class="input-group">
             <label for="search" class="col-form-label">Price Range:</label>
             <label for="search2" class="col-1 col-form-label">From :</label>
              <input type="text" pattern="[0-9\-]{1,15}" class="form-control col-2" name="from">
              <label for="search" class="col-1 col-form-label">To :</label>
              <input type="text" pattern="[0-9\-]{1,15}" class="form-control col-2" name="to">
              <button type="submit" class="btn btn-primary">Search</button>
           </div>
       </div> 
       
</form>
<br>
<form method="get" action="{{ route('search3') }}">
      <div class="well">
          <div class="input-group">
             <label for="search" class="col-form-label">Date Range :</label>
             <label for="search2" class="col-1 col-form-label">From :</label>
              <input type="text" pattern="[0-9\-]{1,15}" class="form-control col-2" name="datefrom" placeholder="DD-MM-YYY">
              <label for="search" class="col-1 col-form-label">To :</label>
              <input type="text" pattern="[0-9\-]{1,15}" class="form-control col-2" name="dateto" placeholder="DD-MM-YYY">
              <button type="submit" class="btn btn-primary">Search</button>
           </div>
       </div> 
       
</form>
<br>
@endsection
@section('content')

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
