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
                     <a href="/admin/parsers/add/{{$id}}/"><button class="btn btn-success">Add New <i class="icon-plus icon-white"></i></button></a> 
                  </div>
               </div>
               <br>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th>Колонка</th>
                            <th>Название</th>
                            <th>Парсер</th>
                            <th>Группа полей</th>
                            <th>В таблицу</th>
                            <th>В фильтр</th>
                            <th>Языковые</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($parsers as $one)
                        <tr class="odd gradeX">
                            <td>{!!$one->column!!}</td>
                            <td>{!!$one->column_name!!}</td>
                            <td>{!!$one->parser!!}</td>
                            <td class="center">{!!$one->column_group!!}</td>
                            <td class="center">{!!$one->show!!}</td>
                            <td class="center">{!!$one->filter!!}</td>
                            <td class="center">{!!$one->multi_lang!!}</td>
                            <td class="center"><a href="/admin/parsers/edit/{!!$one->id!!}/">edit</a></td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /block -->
</div>
@stop