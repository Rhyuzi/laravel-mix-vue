<template>
    <div>
       <a class="hiddenanchor" id="signup"></a>
       <a class="hiddenanchor" id="signin"></a>

       <div class="login_wrapper">
         <div class="animate form login_form">
           <section class="login_content">
             <form class="form" @submit.prevent="login">
               <h1>Login Form</h1>

               <div v-if="this.v$.$error || logFail.error" class="alert alert-danger">
                    <p class="alert" v-if="v$.form.username.$error">{{v$.form.username.$errors[0].$message}}</p>
                    <p class="alert" v-if="v$.form.password.$error">{{v$.form.password.$errors[0].$message}}</p>
                    <p class="alert" v-if="logFail.error">{{logFail.message}}</p>
                 </div>

               <div>
                 <input type="text" v-model="form.username" class="form-control" placeholder="Username" />
               </div>
               <div>
                 <input type="password" v-model="form.password" class="form-control" placeholder="Password" />
               </div>
               <div>
                 <input type="submit" class="btn btn-default submit" value="Log in"/>
                 <a class="reset_pass" href="#">Lost your password?</a>
               </div>

               <div class="clearfix"></div>
             </form>
           </section>
         </div>
       </div>
     </div>
 </template>

 <script>
 import { ref } from 'vue'
 import useValidate from '@vuelidate/core'
 import { required, numeric, maxLength, helpers, email } from '@vuelidate/validators'
 import { account_login } from '../api/api_helpers'


     export default {
         data() {
             return {
                 v$: useValidate(),
                 logFail: {
                     error: false,
                     message: ''
                 },
                 form: {
                     username: '',
                     password: ''
                 }
             }
         },
         validations() {
             return {
             form: {
                 username: {
                     required: helpers.withMessage('Username harus diisi!', required),
                 },
                 password: {
                     required: helpers.withMessage('Password harus diisi!', required)
                 }
             }
             };
         },
         mounted() {
             console.log('Component mounted.')
         },
         methods: {
             async login(){
                 this.v$.$validate()
                 if (this.v$.$error) {
                     console.error(this.v$)
                     return
                 }

                 const result = await account_login('login',this.form)
                 if (result.error == true) {
                     this.logFail.error = true
                     this.logFail.message = result.message
                     return
                 }
                 localStorage.setItem('Users',JSON.stringify(result.data))
                 this.$router.push('/dashboard')
                 console.error(result)
             }
         },
     }
 </script>
