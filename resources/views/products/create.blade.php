@extends('layouts.app')
    @section('content')
    <div style="margin-left: 500px; width: 300px">
        <div class="alert alert-danger">
            @foreach ($errors->all() as $message)
                {{$message}}<br/>
            @endforeach
        </div>
        @if (Session::has('message'))
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
        @endif

        <form action="/products" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token()}}">
            Tên sản phẩm:<input type="text" name="name" class="form-control {{$errors->has('name')? 'alert-danger':'' }}" value="{{ old('name')}}" size="50"> <br/>
            Mo ta san pham: <input type="text" name="description" class="form-control" value="{{ old('description')}}"> <br/>
            Gia: <input type="text" name="unit_price" class="form-control" value="{{ old('unit_price')}}"> <br/>
            Loai san pham: <select name="id_type" class="form-control">
                @foreach($product_type as $v)
                    @if (old('id_type') == $v->id)
                        <option value="{{$v->id}}" selected>{{$v->name}}</option>
                  @else
                        <option value="{{$v->id}}">{{$v->name}}</option>
                  @endif
                @endforeach
            </select>
            <br/>
            <input type="submit" class="btn btn-primary" value="Tao moi" />
        </form>
    </div>
    @endsection