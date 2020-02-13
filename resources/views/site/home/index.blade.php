@extends('site.template.template1')

@section('content')
    
<H1>Home Page do site</H1>

{{$var1 or ''}}
{{$teste2 or ''}}

@if($teste2 == '1321')
<p>e igual</p>
@else
<p>e dif</p>
@endif



@endsection