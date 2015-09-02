@extends('admin.layout')
@section('content')
<div class="row-fluid">
    <!-- block -->
    <div class="block">
        <div class="navbar navbar-inner block-header">
            <div class="muted pull-left">Bootstrap dataTables with Toolbar</div>
        </div>
        <div class="block-content collapse in">
            <div class="span12">
               <div class="table-toolbar">
                  <div class="btn-group">
                     <a href="/admin/table/add/{{$id}}"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a>
                     
                  </div>
                  <div class="btn-group">
                     <a href="/admin/parsers/{{$id}}"><button class="btn btn-primary">Columns <i class="icon-pencil icon-white"></i></button></a>
                     
                  </div>
                  <div class="btn-group pull-right">
                     <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                     <ul class="dropdown-menu">
                        <li><a href="#">Print</a></li>
                        <li><a href="#">Save as PDF</a></li>
                        <li><a href="#">Export to Excel</a></li>
                     </ul>
                  </div>
               </div>
               <br>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                    <thead>
                        <tr>
                        @foreach($columns as $one)
                        	 <th>{!!$one->column_name!!}</th>
                        @endforeach
                        	<th>edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($array as $one)
	                        <tr class="even gradeA">
	                        	@foreach($select as $two)
	                        		@if($two!='id')
	                        		 <td>{!!$one->$two!!}</td>
	                        		@endif
	                        	@endforeach
	                        	<td><a href="/admin/table/edit/{!!$id!!}/{!!$one->id!!}">Edit</td>     		
	                        </tr>
                        @endforeach             
                    </tbody>
                </table>
                {!!$paginator!!}
            </div>
        </div>
    </div>
    <!-- /block -->
</div>
@stop