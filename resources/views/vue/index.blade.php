@extends('master')

@section('title', 'Restaurant Management')

@section('content')
<router-link to="/menu">Menu</router-link>

<router-view></router-view>
@endsection
@section('pagescript')
<script src="js/vue.js"></script>
@stop  
