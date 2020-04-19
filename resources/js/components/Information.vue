<template>
    <div>
        <div class="container">
            <h2 class="text-center mt-2 mb-2"> All information</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Country</th>
                    <th>Subject</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(item,index) in personals" :key="item.id" :index="index">
                    <td>{{item.fname}}</td>
                    <td>{{item.lname}}</td>
                    <td>{{item.country}}</td>
                    <td>{{item.subject}}</td>

                </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "Information",
        data: function () {
            return{
                personals : [],
            }
        },
        created(){
            this.allInformation();
        },
        methods:{
            allInformation: function () {
                axios.get('http://simpleform.test/information/all')
                    .then(res =>{
                        this.personals = res.data;

                } )
                    .catch(err=>console.log(err))
            }

        }

    }
</script>

<style scoped>

</style>