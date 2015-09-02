<div class="control-group">
  <label class="control-label" for="focusedInput">{!!$label!!}</label>
  <div class="controls">
  	<textarea name="{!!$name!!}" class="@if(isset($params['visual_redactor']) && $params['visual_redactor']=='1') textarea @endif">
  		{!!$value!!}
  	</textarea>
  </div>
</div>