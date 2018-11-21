<template>	
	<div>	
		<div class="jumbotron">
		    <h1></h1>
		</div>
		<user-list :users="users" 
		    v-on:edit-user="editUser"
		    @delete-user="deleteUser"></user-list>

		<div class=" alert" :class="{'alert-success':showSuccess, 'alert-danger':showFailure}" v-if="showSuccess || showFailure">
		    <button type="button" @click="showSuccess = false; showFailure = false;"class="close-btn" >&times;</button>
		    <strong>@{{successMessage}}</strong>
		    <strong>@{{failMessage}}</strong>
		</div>

		<div class="jumbotron" v-if="editingUser">
			<h2>Edit User</h2>
		    <div>
		        <label>Name</label>
		        <input type="text" v-model="currentUser.name">
		    </div>
		    <div>
		        <label>Email</label>
		        <input type="text" v-model="currentUser.email">
		    </div>
		    <div>
		        <label>Age</label>
		        <input type="text" v-model="currentUser.age">
		    </div>
		    <div>
		        <label>Department</label>
		        <select v-model="currentUser.department_id">
		            <option v-for="department in departments" v-bind:value="department.id">@{{department.name}}</option>
		        </select>
			</div>
			<button @click="cancelEdit()">Cancel</button>
	    	<button @click="saveUser()">Save</button>


		</div>
	</div>
</template>
<script>
	module.exports = {
		data: function(){
       		return	{
       			title: 'List Users',
	       		editingUser: false,   
	       		showSuccess: false,
	       		showFailure: false,
	       		successMessage: '',
	       		failMessage: '',
	       		currentUser: {},
	        	users: [],
	        	departments: []
        	}
		},
    methods: {
        editUser: function(user){
            this.editingUser = true;
            this.currentUser = Object.assign({},user);


         
        },
        deleteUser: function(user, index){
            axios.delete('/api/users/'+user.id).then(response=>{
                this.successMessage = 'User deleted successfuly';
                this.showSuccess = true;

                this.users.splice(index, 1);
            }).catch(error=>{
                this.failMessage = 'User delition error';
                this.showFailure = true;
            })
         
        },
        saveUser: function(){
            const user = this.currentUser;
            axios.put('api/users/'+ user.id, user).then(response =>{
                this.successMessage = 'User updated';
                this.showSuccess = true;
                this.showFailure = false;
                this.failMessage = "";

                this.users.forEach(u => {
                        if(u.id == user.id){
                            Object.assign(u, response.data.data);

                        }
                    })
                setTimeout(() =>{
                    this.showFailure = false;
                    this.showSuccess = false;
                },2000)
            }).catch(error =>{
                this.failMessage = 'User not updated';
                this.showFailure = true;
                this.showSuccess = false;
                this.successMessage = "";
            })
         
        },
        cancelEdit: function(){
            this.editingUser = false;
         
        }
    },
    mounted() {
        axios.get('/api/users').then(response => {
            this.users = response.data.data;
        })
        axios.get('/api/departments').then(response => {
            this.departments = response.data.data;
        })
        
    }
	}
</script>