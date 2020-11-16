@extends('layout.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <div class="card-body">
                 @if(isset($categories))                 
                    @foreach($categories as $category)
                    <div class="col-md-12">
                        <h3>{{ $category->name }}</h3>
                        <hr />
                        
                    </div>
                    @endforeach
                @endif
                @if(isset($breadcrumbs))
                <div class="col-md-12">
                    <h3>{{ $breadcrumbs }}</h3>
                    <hr />                    
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection