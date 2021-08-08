@extends('layouts.app')
<script type="text/javascript">
  setTimeout("location.href='/'",1000*4);
</script>
@section('content')
<h1 class="setTimeout">{{ __('Thank you for your e-mail') }}</h1>
@endsection