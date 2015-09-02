
var project = {

    widgets: {
        
        table: function(self) {
        	 $("#create_table").on('click', function() {
        	 	var data = $(self).find("form").serializeArray();
        	 	
	        	$.post('/admin/create_table', data, function (data) {
	            	//callback
	            }, 'JSON');
	             
	            
        	 })    
        },
        
        add_parsers: function(self) {
	        $('.row-fluid').on('click','#createField', function() {
		        var data = $(self).find("form").serializeArray();
        	 	console.log(data);
	        	$.post('/admin/createfield', data, function (data) {
	            	//callback
	            }, 'JSON');
	        });
	        
	        $('.form-horizontal').on('change', '.js-model', function() {
	        	console.log($(this).val());
	        })
        },
        
        js_parser: function(self) {
	        $(".js-parser").change(function(){
	        	var token = $(this).data('token');
		    	$( ".js-parser option:selected" ).each(function() {
		    		var name = $(this).val();
		    		if(name){
		    			$.post('/admin/checkParserConf', {'name': name, '_token': token}, function (data) {
			            	if(data.field) {
				            	$('.parser_conf').html(data.field);	
			            	} else {
				            	$('.parser_conf').html("");	
			            	}
			            }, 'JSON');
		    		}
			    }); 
	        });
        },
        
        save_parsers: function(self) {
	        $("#saveParser").on('click', function() {
		        var data = $(self).find("form").serializeArray();
        	 	
	        	$.post('/admin/save_parser', data, function (data) {
	            	//callback
	            }, 'JSON');
	        })
        }

    },

    init: function(){
        $(function(){
            $("[data-js]").each(function(){
                var self=$(this);
                project.widgets[self.data("js")](self, self.data());
            });
        });
    },
}

project.init();

