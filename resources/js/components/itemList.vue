<template>
    <div>
        <vuetable ref="vuetable"
          api-url="http://projeto.dad/api/items"
          :fields="fields"
          data-path="data"
          pagination-path=""></vuetable>
          <div></div>
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
                <tr v-for="(item,index) in items" :key="item.id">
                    <td>{{item.name}}</td>
                    <td>{{item.type}}</td>
                    <td>{{item.description}}</td>
                    <td>{{item.price}}</td>
                    <td><img :src="'storage/items/' + item.photo_url"  width="50" height="50"></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import Vuetable from 'vuetable-2';

    export default {

        data: function() {
            return {
                items: "",
                fields: []
            }
        },
        methods: {

        },
        mounted() {
            axios.get('/api/items').then(response => {
                this.items = response.data.data;

                this.lastPage = response.data.meta.last_page;
            })
        }
    }

</script>
<style></style>
