@extends('layouts.app')
    @section('content')
        Product name: {{$result->name}} <br/>
        Product price: {{$result->unit_price}} <br/>
@endsection