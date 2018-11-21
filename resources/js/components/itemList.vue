<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Photo</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item,index) in items" :key="user.id">
                <td>{{item.name}}</td>
                <td>{{item.type}}</td>
                <td>{{item.description}}</td>
                <td>{{item.price}}</td>
                <td>photo_place</td>
            </tr>
        </tbody>
    </table>
</template>
<script>
module.exports = {
    props: ["items"],
    data: function(){
        return {

        }
    },
    methods: {
        
    }
}
</script>
<style></style>
