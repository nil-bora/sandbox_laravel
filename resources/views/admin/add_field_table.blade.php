@extends('admin.layout')
@section('content')
<div class="row-fluid">
<!-- block -->
<div class="block">
    <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Form Example</div>
    </div>
    <div class="block-content collapse in">
        <div class="span12">
            <form class="form-horizontal">
              <fieldset>
                <legend>Form Components</legend>
                @foreach($fields as $one)
                	{!!$one!!}
                @endforeach
                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            </form>

        </div>
    </div>
</div>
<!-- /block -->
</div>
<link href="/src/vendors/wysiwyg/bootstrap-wysihtml5.css" rel="stylesheet" media="screen">
<script src="/src/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
<script src="/src/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>
<script>

$(function() {
    $('.textarea').wysihtml5();

});
</script>
@stop