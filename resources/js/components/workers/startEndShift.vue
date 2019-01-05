<template>
    <div>
        <div v-if="this.working==0">
            Not working, last shift date:{{date}}:::::::::::{{workingTime}} minutes since last shift
            <button type="" @click.prevent="toggleShift">Start Shift</button>
        </div>
        <div v-if="this.working==1">
            Working, shift start date:{{date}}:::::::::::{{workingTime}} minutes since shift started
            <button type="" @click.prevent="toggleShift">End Shift</button>   
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return{
                working:'',
                date:'',
                workingTime:'',
                now:'',
            };
        },
        methods: {
            getDate(){
                this.now = moment();
                axios.get('api/users/shiftInfo/'+this.$store.state.user.id)
                    .then(response=>{
                        this.working=response.data.data.shift_active;
                        if(!this.working){
                            this.date=response.data.data.last_shift_end;
                        }else{
                            this.date=response.data.data.last_shift_start;
                        }
                        this.workingTime = this.now.diff(moment(this.date),'minutes');
                    }).
                catch(error=>{
                }); 
            },
            toggleShift(){
                this.now = moment();

                axios.get('api/users/toggleShift/'+this.$store.state.user.id)
                    .then(response=>{
                        this.working=response.data.data.shift_active;
                        if(!this.working){
                            this.date=response.data.data.last_shift_end;
                        }else{
                            this.date=response.data.data.last_shift_start;
                        }
                        this.workingTime = this.now.diff(moment(this.date),'minutes');

                    }).
                catch(error=>{
                });
            },
        },
        mounted() {
            this.getDate();
        },
    }
</script>
