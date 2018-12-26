<template>
    <div>
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
        <!-- <paginate :page-count="10" :container-class="pagination" :prev-text="prev" :next-text="next" :click-handler="clickCallback">
        </paginate> -->
    </div>
</template>
<script>
module.exports = {
    data: function() {
        return {
            items: "",
        }
    },
    methods: {

    },
    mounted() {
        axios.get('/api/items').then(response => {
            this.items = response.data.data;
        })
    }
}

</script>
<style></style>
