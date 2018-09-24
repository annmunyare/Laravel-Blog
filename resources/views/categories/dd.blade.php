<!-- @extends('layouts.app')

@section('content')
	<div class="form-group">
    
	     {!! Form::label('parent', 'Parent Category:')!!}
	     {!! Form::select('parent', $categories, null, ['placeholder' => 'Choose Category'])!!}
	</div>
	 
	<div class="form-group">
	     {!! Form::label('children', 'Child category:')!!}
	     {!! Form::select('children', [], null, ['placeholder' => 'Choose child category'])!!}
	</div>

@endsection

@section('form-script')
<script>
	$('#parent').change(function(e) {
		var parent = e.target.value;
		$.get('/categories/children?parent=' + parent, function(data) {
			$('#children').empty();
			$.each(data, function(key, value) {
				var option = $("<option></option>")
	                  .attr("value", key)		                  
	                  .text(value);

				$('#children').append(option);
			});
		});
	});
</script>
@endsection -->