<template>
    <div>
        <div class="alert" :class="typeofmsg" v-if="showMessage">
            <button type="button" class="close-btn" v-on:click="showMessage=false">&times;</button>
            <strong>{{ message }}</strong>
        </div>
        <div class="jumbotron">
            <h2>Register</h2>
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="name" class="form-control" v-model="name" name="name" id="inputName" placeholder="Name" />
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" v-model="email" name="email" id="inputEmail" placeholder="Email address" />
            </div>
            <div>
                <label for="selectType">Type of worker</label>
                <select v-model="typeSelected" id="selectType" name="selectType" class="form-control">
                    <option disabled value="">Please select the type of worker</option>
                    <option v-for="type in typesOfWorkers" v-bind:value="type.value"> {{ type.text }} </option>
                </select>
            </div>
            <div class="form-group">
                <a class="btn btn-primary" v-on:click.prevent="registerAccount">Register</a>
            </div>
        </div>
    </div>
</template>
<script type="text/javascript">
export default {
    data: function() {
        return {
            
            typesOfWorkers: [{ text: 'Manager', value: 'manager' }, { text: 'Cook', value: 'cook' }, { text: 'Cashier', value: 'cashier' }, { text: 'Waiter', value: 'waiter' }],
                email: "",
            typeofmsg: "alert-success",
            showMessage: false,
            message: "",
            email: '',
            name: '',
            username: '',
            typeSelected: '',
        }
    },
    methods: {
        registerAccount() {
            this.showMessage = false;

            const formData = new FormData();

            formData.append('name', this.name);
            formData.append('email', this.email);
            formData.append('type', this.typeSelected);
            formData.append('username', 'gay');

            axios.post('api/registerAccount', formData)
                .then(response => {
                    this.$store.commit('setUser', response.data.data);
                    this.typeofmsg = "alert-success";
                    this.message = "User registered sucessfuly";
                    this.showMessage = true;
                })
                .catch(error => {
                    this.$store.commit('clearUserAndToken');
                    this.typeofmsg = "alert-danger";
                    this.message = "Invalid credentials";
                    this.showMessage = true;
                    console.log(error);
                })
        }
    },
}

</script>
