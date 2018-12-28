<template>
    <div>
        <div class="alert" :class="typeofmsg" v-if="showMessage">
            <button type="button" class="close-btn" v-on:click="showMessage=false">&times;</button>
            <strong>{{ message }}</strong>
        </div>
        <div class="jumbotron">
            <h2>Edit Account</h2>
            <div v-if="$store.state.user"> 
                <li>{{$store.state.user.email}}</li>
            </div>
            <div class="form-group">
                <label for="editName">Name</label>
                <input type="text" class="form-control" v-model="user.name" name="name" id="editName" placeholder="Name" />
            </div>
             <div class="form-group">
                <label for="editUsername">Username</label>
                <input type="text" class="form-control" v-model="user.username" name="username" id="editUsername" placeholder="Username" />
            </div>
            <div class="form-group">
                <a class="btn btn-primary" v-on:click.prevent="editAccount">Edit</a>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    data() {
        return {
            user: {name: '', username: ''},
            typeofmsg: "alert-success",
            showMessage: false,
            message: "",
        }
    },
    methods: {
        editAccount() {
            this.showMessage = false;
            this.showErrors = false;

            const formData = new FormData();

            formData.append('name', this.user.name);
            formData.append('username', this.user.username);

            axios.post('api/workers/editAccount/'+this.user.id, formData)
                .then(response => {
                    this.typeofmsg = "alert-success";
                    this.showMessage = true;
                    this.message = "Data edited sucessfuly";
                })
                .catch(error => {
                    this.typeofmsg = "alert-danger";
                    this.showMessage = true;
                    this.message = "Impossible to edit data";
                })
        }
    },
    mounted() {
        if (this.$store.state.user == null) {
            this.$router.push({path: '/login'});
            return;
        }
            this.user = this.$store.state.user;
    }
}

</script>