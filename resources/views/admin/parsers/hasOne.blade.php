<div class="control-group success">
  <label class="control-label" for="selectError">{!!$label!!}</label>
  <div class="controls">
    <select id="selectError" class="js-model" name={!!$name!!}>
      <option>выбрать модель</option> 
      @foreach($value as $item)
		<option value="{!!$item!!}">{!!$item!!}</option>     
      @endforeach
    </select>
  </div>
</div>
<div class="control-group">
  <label class="control-label" for="focusedInput">Первичный ключ(по умолчанию id)</label>
  <div class="controls">
    <input class="input-xlarge focused" name="foregenkey" type="text" value="id">
  </div>
</div>