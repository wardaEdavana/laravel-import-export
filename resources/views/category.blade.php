@extends('layout.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="row">
            <div class="card-body">
                
                @foreach($parentCategories as $category)
 
                  {{$category->name}}

                  @if(count($category->subcategory))
                    @include('subCategory',['subcategories' => $category->subcategory])
                  @endif
                 
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection