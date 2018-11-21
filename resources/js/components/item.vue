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
        
    },
    mounted() {
            
        
        }
	}
</script>