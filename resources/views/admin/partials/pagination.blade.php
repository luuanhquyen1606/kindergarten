<div data-list="" class="row center col-auto d-flex">
                  <ul class="mb-0 pagination">
{{-- Page numbers --}}
@php
    $start = max($paginator->currentPage() - 4, 1);
    $end = min($paginator->currentPage() + 4, $paginator->lastPage());
@endphp

{{-- First page --}}
@if($start > 1)
   
     <li>
              <a href="{{ $paginator->url(1) }}" class="page " data-list-pagination="prev" >1</a>
            </li>

    @if($start > 2)
        <li>
              <a href="" class="page " data-list-pagination="prev" >...</a>
            </li>
    @endif
@endif

{{-- Current page range --}}
@for($i = $start; $i <= $end; $i++)

    @if($i == $paginator->currentPage())
         <li class="active">
                      <a class="page" type="button" data-i="1" data-page="10">{{ $i }}</a>
                    </li>
    @else
      <li>  
                    <a  href="{{ $paginator->url($i) }}" class="page" type="button" data-i="2" data-page="10">{{ $i }}</a>
                    </li>
        
    @endif

@endfor

{{-- Last page --}}
@if($end < $paginator->lastPage())

    @if($end < $paginator->lastPage() - 1)
        <li><span>...</span></li>
    @endif

  

     <li>
        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="page pe-0" data-list-pagination="next">{{ $paginator->lastPage() }}</a>
</li>  

@endif
</ul>

  

</div>
