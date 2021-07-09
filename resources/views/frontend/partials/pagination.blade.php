@if ($paginator->hasPages())
    <ul class="mx-auto">
       
        @if ($paginator->onFirstPage())
            <li class="disabled"><a><i class="fas fa-long-arrow-alt-left margin-5px-right d-none d-md-inline-block"></i>  Prev</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fas fa-long-arrow-alt-left margin-5px-right d-none d-md-inline-block"></i>  Prev</a></li>
        @endif


      
        @foreach ($elements as $element)
           
            @if (is_string($element))
                <li class="disabled"><a>{{ $element }}</a></li>
            @endif


           
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><a href="#">Next <i class="fas fa-long-arrow-alt-right margin-5px-left d-none d-md-inline-block"></i></a></li>
        @endif
    </ul>
@endif 