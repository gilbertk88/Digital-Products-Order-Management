<label {!! $__field->attributes($__field->getOption('label_attr')) !!}>{!! $__field->getOption('label') !!}</label>
<textarea name="{{ $__field->getName() }}" {!! $__field->attributes($__field->getAttributes()) !!}>{{ $__field->getValue() }}</textarea>
@include($__field->getTheme().'.types.includes.info', ['field' => $__field])
@include($__field->getTheme().'.types.includes.errors', ['field' => $__field])