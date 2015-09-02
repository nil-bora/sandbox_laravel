@extends('admin.layout')
@section('content')
<div class="block" data-js="table">
<div class="navbar navbar-inner block-header">
    <div class="muted pull-left">Таблица</div>
</div>
<div class="block-content collapse in">
    <div class="span12">
         <form class="form-horizontal" method="POST">
          <fieldset>
            <legend>Создание таблицы</legend>
            <div class="control-group">
              <label class="control-label" for="focusedInput">Имя</label>
              <div class="controls">
                <input class="input-xlarge focused" id="" name="name" type="text" value="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="focusedInput">Системное имя</label>
              <div class="controls">
                <input class="input-xlarge focused" id="" name="system_name" type="text" value="">
              </div>
            </div>            
            <div class="control-group">
              <div class="controls">
                <label>
                  <input type="checkbox" id="" value="1" name="active">
                  Видимость
                </label>
              </div>
            </div>
           <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
            <div class="form-actions">
              <button class="btn btn-primary" type="button" id="create_table" >Добавить</button>
            </div>
          </fieldset>
        </form>
    </div>
</div>
</div>
@stop