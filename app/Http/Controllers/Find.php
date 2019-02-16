<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;
class Find extends Controller
{
  
  public function index()
    {

      $data = collect(getdata()['hotels']);
      return view('show' , compact('data'));
    }
 public function sorting(Request $request)
    {
      $prasort = request('prasort');
      $data = collect(getdata()['hotels'])->sortBy($prasort);
   dd($data);
      return view('show' , compact('data'));
    }
  public function searchJson( $obj, $value )
     {
    foreach( $obj as $key => $item ) {
        if( !is_nan( intval( $key ) ) && is_array( $item ) ){

          if( in_array( $value, $item ) ) return $item;

        } else {
            foreach( $item as $child ) {
                if(isset($child) && $child == $value) {
                    return $child;
                }
            }
        }

    }
    return null;
  }

  public function search(Request $request) 
    {
    $data = collect(getdata()['hotels']);
    $fdata = strtolower($data);
    $sdata = json_decode($fdata,true);
    $search = strtolower(request('search'));  
      $results = self::searchJson( $sdata , $search);
      if ($results != '') {
      return view('search') -> with (compact('results','search'));
      }
      echo "<div class='alert alert-danger'>
                    Try Again <br>
                    </div>";
   }
  public function search3($hotels, $from, $to){

    $format = 'd-m-Y';
    $results = array();

    foreach ($hotels as $hotelKey => $hotelProperties) {

        foreach ($hotelProperties['availability'] as $range) {

            $availableFrom = DateTime::createFromFormat($format, $range['from']);
            $availableTo = DateTime::createFromFormat($format, $range['to']);
          //  dd($availableFrom);
            if ($from <= $availableFrom && $to >= $availableTo) {
              $results[$hotelKey] = $hotelProperties;
            }
        }

    }

    return $results;
}

  public function pricesearch(Request $request) 
    {
    $from = request('from');
    $to = request('to');
    $data = collect(getdata()['hotels'])
    ->where('price', '>=', $from)
    ->where('price', '<=', $to)->all();
    if ($data != '') {
    return view('search2')->with(compact('data','from','to'));
    }

   }
  public function datesearch(Request $request)
   {
      $format = 'd-m-Y';
      $date1 = request('datefrom');
      $date2 = request('dateto');
    $datefrom = DateTime::createFromFormat($format,$date1);
    $dateto = DateTime::createFromFormat($format, $date2);
    $data2 = collect(getdata()['hotels'])->all();
    $daterange = self::search3($data2,$datefrom,$dateto);
  if ($daterange != '') {
    return view('search3')->with(compact('daterange' ,'date1','date2'));
  }
   }

}
