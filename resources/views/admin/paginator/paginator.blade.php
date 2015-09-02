
@if($array)
<div class="row">
	<div class="span6">
		<div class="dataTables_paginate paging_bootstrap pagination">
			<ul>
				<li class="prev @if($array->currentPage() <= 1) disabled @endif"><a href="?page={{$array->currentPage()-1}}">← Previous</a></li>
				@for( $i=1; $i<=$countPage; $i++)
					<li @if($i==$array->currentPage())class="active"@endif><a href="?page={{$i}}">{{$i}}</a></li>
				@endfor
				<li class="next @if($array->currentPage() == $array->perPage()) disabled @endif"><a href="{{$array->nextPageUrl()}}">Next → </a></li>
			</ul>
		</div>
	</div>
</div>
@endif
