

@extends ('layout') @section('tieudetrang')
{{$tin->tieuDe}}
@endsection
@section('noidung')
<h2>{{$tin->tieuDe}}</h2>
<h3>{{$tin->tomTat}}</h3>
<div id="noiDung"> {!! $tin->noiDung !!}
</div> @endsection
