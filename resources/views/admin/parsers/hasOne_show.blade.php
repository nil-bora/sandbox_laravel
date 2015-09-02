<div class="control-group success">
  <label class="control-label" for="selectError">{!!$label!!}</label>
  <div class="controls">
    <select id="selectError">
      @foreach($hasModel as $one)
     	 <option @if($selected->name == $one->name) selected @endif>{!!$one->name!!}</option>
      @endforeach
    </select>
  </div>
</div>