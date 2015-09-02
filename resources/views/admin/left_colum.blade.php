<div class="span3" id="sidebar">
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        @foreach ($tables as $key=>$item)
        <li>
            <a href="/admin/table/show/{!!$item->id!!}"><i class="icon-chevron-right"></i>{!!$item->name!!}</a>
        </li>
        @endforeach
        
    </ul>
</div>