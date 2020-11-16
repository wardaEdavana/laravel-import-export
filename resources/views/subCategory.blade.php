@foreach($subcategories as $subcategory)
 <ul>
    <li>{{$subcategory->name}}</li> 
  @if(count($subcategory->subcategory))
    @include('subCategory',['subcategories' => $subcategory->subcategory])
  @endif
 </ul> 
@endforeach