@extends('layouts.auth')
@section('title')
To DO's
@endsection
@section('css')
<style>
.center {
  padding: 2vh 0;
}
body{
  background-color: darkslategray;
}
</style>
@endsection
@section('content') 
@livewire('index')
@endsection
@section('js')
@endsection