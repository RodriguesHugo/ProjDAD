@extends('master')

@section('title', 'Vue.js App')

@section('content')
<router-link to="/menu">Menu</router-link>
<router-link to="/login">Login</router-link>
<router-link to="/logout">Logout</router-link>
<!-- <router-link to="/list">List</router-link>
 -->
<router-view></router-view>
@endsection
@section('pagescript')
<script src="js/vue.js"></script>
@stop  
