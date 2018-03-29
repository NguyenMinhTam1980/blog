
    @extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="content">
                Chao ban: {{$getCache->name}} <br/>
                Danh sach product type: <br/>
                @foreach ($product_type as $t)
                    {{$t->ProductType->name}} --- {{$t->ProductType->description}}<br />
                    {{$t->name}} --- {{$t->unit_price}}<br />
                @endforeach
                <br/>
                @foreach ($result as $k)
                <a href="/product/{{$k->id}}">{{$k->name}}</a>  ---- 
                {{$k->unit_price}} </br>
                @endforeach
            </div>
            Public path: {{public_path()}}
            <br/>
            <ul class="pagination">{{$result->render()}}</ul>
        </div>
@endsection