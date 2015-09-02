@extends('admin.layout')
@section('content')
<div class="row-fluid section" data-js="save_parsers">
	 <!-- block -->
	<div class="block">
	    <div class="navbar navbar-inner block-header">
	        <div class="muted pull-left">Form Wizard</div>
	    </div>
	    <div class="table-toolbar">
	      <div class="btn-group">
	         <a id="saveParser"><button class="btn btn-success">Save <i class="icon-plus icon-white"></i></button></a>
	      </div>
	   </div>
	    <div class="block-content collapse in">
	        <div class="span12">
	            <div id="rootwizard">
	                <div class="navbar">
	                  <div class="navbar-inner">
	                    <div class="container">
			                <ul>
			                    <li><a href="#tab1" data-toggle="tab">Основные</a></li>
			                    <li><a href="#tab2" data-toggle="tab">Парсер</a></li>
			                    <li><a href="#tab3" data-toggle="tab">Системные</a></li>
			                </ul>
		                </div>
	                  </div>
	                </div>
	                <form method="POST" name="createfield">
	                <div class="tab-content">
	                	
	                    <div class="tab-pane" id="tab1">
	                       <div class="form-horizontal">
	                          <fieldset>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">Таблица</label>
	                              <div class="controls">
	                                <input class="input-xlarge focused" name="table" id="focusedInput" type="text" value="{!!$parser->table!!}">
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">Колонка</label>
	                              <div class="controls">
	                                <input class="input-xlarge focused" name="column" id="focusedInput" type="text" value="{!!$parser->column!!}">
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">Название</label>
	                              <div class="controls">
	                                <input class="input-xlarge focused" name="column_name" id="focusedInput" type="text" value="{!!$parser->column_name!!}">
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">Описание</label>
	                              <div class="controls">
	                                <input class="input-xlarge focused" name="descr" id="focusedInput" type="text" value="{!!$parser->descr!!}">
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">Группа</label>
	                              <div class="controls">
	                                <input class="input-xlarge focused" name="column_group" id="focusedInput" type="text" value="{!!$parser->column_group!!}">
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">Позиция</label>
	                              <div class="controls">
	                                <input class="input-xlarge focused" name="pos" id="focusedInput" type="text" value="{!!$parser->pos!!}">
	                              </div>
	                            </div>
	                          </fieldset>
	                        </div>
	                    </div>
	                    <div class="tab-pane" id="tab2">
	                        <div class="form-horizontal">
	                          <fieldset>
	                             <div class="control-group js-control-group">
                                  <label class="control-label" for="selectParser">Парсер</label>
                                  <div class="controls" data-js="js_parser">
                                    @if ($parsers)
                                    <select id="selectParser" name="parser" class="js-parser" data-token="{{ csrf_token() }}">
                                      @foreach ($parsers as $one) 
                                    	  <option value="{!!$one['name']!!}" @if($parser->parser==$one['name']) selected @endif>{!!$one['name']!!}</option>
                                      @endforeach
                                    </select>
                                    @endif
                                  </div>
                                  <div class="parser_conf">
                                  @if($confField)
                                  	{!!$confField!!}                                  	  
                                  @endif
                                  </div>
                                </div>
                                
	                          </fieldset>
	                        </div>
	                    </div>
	                    <div class="tab-pane" id="tab3">
	                        <div class="form-horizontal">
	                          <fieldset>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">В таблицу</label>
	                              <div class="controls">
	                              	 <input type="checkbox" value="1" @if($parser->show == '1') checked @endif name="show">
	                               
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">Мультиязычность</label>
	                              <div class="controls">
	                                 <input type="checkbox" value="1"  @if($parser->multi_lang == '1') checked @endif name="multi_lang">
	                              </div>
	                            </div>
	                            <div class="control-group">
	                              <label class="control-label" for="focusedInput">Фильтр</label>
	                              <div class="controls">
	                                 <input type="checkbox" value="1"  @if($parser->filter == '1') checked @endif name="filter">
	                              </div>
	                            </div>
	                          </fieldset>
	                        </div>
	                    </div> 
	                </div>  
	                <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}">
	                <input type="hidden" name="id" value="{!!$id!!}">
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
	<!-- /block -->
	</div>
	<script src="/src/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
	
	<script>
	$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {}});
	</script>
@stop