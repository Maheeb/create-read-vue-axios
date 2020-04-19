<template>
    <div>
        <h3 class="text-center mb-2 mt-2">I am a simple form </h3>

        <div   class="container">

            <div   class="form_body">
            <form  @submit.prevent="addInfo"  action="">
                <label for="fname">First Name</label>
                <input v-model="userInfo.firstName" type="text" id="fname" name="firstName" placeholder="Your name..">

                <label for="lname">Last Name</label>
                <input  v-model="userInfo.lastName" type="text" id="lname" name="lastName" placeholder="Your last name..">

                <label for="country">Country</label>
                <select   v-model="userInfo.country" id="country" name="country">
                    <option disabled value="">Please select one</option>
                    <option   v-for="(item,index) in countries" v-bind:key="index.id"  v-bind:item="item"
                    >{{item}}</option>

                </select>

                <label for="subject">Subject</label>
                <textarea v-model="userInfo.subject" id="subject"  placeholder="Write something.." style="height:200px"></textarea>

                <button   type="submit" class="btn btn-success"> Submit </button>
            </form>

            </div>


        </div>

        <br><br>
        <div class="container" v-if="isSubmitted == true">

            <div class="show_data">
                <h3 class="text-center text-success">Your submitted Data</h3>
            <div class="card">
                <div class="card-body ">
                    <ul style="list-style: none">
                        <li>First Name: {{userInfo.firstName}}</li>
                        <li>Last Name: {{userInfo.lastName}}</li>
                        <li>Country: {{userInfo.country}}</li>
                        <li>Subject: {{userInfo.subject}}</li>
                    </ul>

                </div>
            </div>
            </div>
        </div>


    </div>
</template>

<script>

    import axios from 'axios'
    import Vue from 'vue';
    import VueToast from 'vue-toast-notification';
    // Import any of available themes
    import 'vue-toast-notification/dist/theme-default.css';
    //import 'vue-toast-notification/dist/theme-sugar.css';
    export default {
        name: "SimpleForm",
        data: function () {
            return{
                infos:[],
                userInfo:{
                    id: '',
                    firstName: '',
                    lastName: '',
                    country:'',
                    subject:'',
                },
                countries:['australia','canada','usa'],
                isSubmitted: false,
            }
        },

        methods: {
            addInfo: function () {
                axios.post('http://simpleform.test/information/post', {
                    firstName: this.userInfo.firstName,
                    lastName: this.userInfo.lastName,
                    country: this.userInfo.country,
                    subject: this.userInfo.subject,

                })
                    .then(()=>{
                        // alert('Your data added successfully');
                        this.isSubmitted = true;
                        this.sucsessMessage();
                    })
                    .catch(err => console.log(err))

            },
            sucsessMessage: function () {
                this.$toasted.show("Information successfully added..!");

            },
        }
    }
</script>

<style scoped>
    body {font-family: Arial, Helvetica, sans-serif;}
    * {box-sizing: border-box;}
.form_body{}
    input[type=text], select, textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    /*.container {*/
        /*border-radius: 5px;*/
        /*background-color: #f2f2f2;*/
        /*padding: 20px;*/
    /*}*/

    .show_data{

        margin-bottom: 30px;
    }
</style>