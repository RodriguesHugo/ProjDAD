@extends('master')

@section('title', 'Restaurant Management')

@section('content')
<router-link to="/menu">Menu</router-link>
<router-link to="/login" v-show="this.$store.state.user == null">Login</router-link>
<router-link to="/logout" v-show="this.$store.state.user != null">Logout</router-link>
<router-link to="/workers/registerAccount" v-show="this.$store.state.user != null && this.$store.state.user.type == 'manager'">Register</router-link>
<router-link to="/workers/confirmAccount">Confirm Account</router-link>
<router-link to="/workers/editAccount" v-show="this.$store.state.user != null">Edit Account</router-link>

<router-view></router-view>
@endsection
@section('pagescript')
<script src="js/vue.js"></script>
@stop  
