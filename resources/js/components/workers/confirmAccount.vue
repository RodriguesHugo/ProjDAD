<template>
    <div>
        <div class="alert" :class="typeofmsg" v-if="showMessage">
            <button type="button" class="close-btn" v-on:click="showMessage=false">&times;</button>
            <strong>{{ message }}</strong>
        </div>
        <div class="jumbotron">
            <h2>Confirm Account</h2>
            <div v-if="$store.state.user">{{$store.state.user.name}}</div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input
                    type="password" class="form-control" v-model="password"
                    name="password" id="inputPassword"/>
            </div>
            <div class="form-group">
                <label for="inputConfirmPassword">Confirm password</label>
                <input
                    type="password" class="form-control" v-model="confirmPassword"
                    name="inputConfirmPassword" id="inputConfirmPassword"/>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" v-on:click.prevent="confirmAccount">Register</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function(){
            return { 
                password:'',
                confirmPassword:'',
                typeofmsg: "alert-success",
                showMessage: false,
                message:'',
            }

        } ,
        methods: {
            confirmAccount() {

            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
