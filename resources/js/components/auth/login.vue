<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

let form = reactive({
    email: '',
    password: ''
})

let error = ref('')

const login = async() => {
    await axios.post('/api/login', form).then(response => {
        if (response.data.success) {
            localStorage.setItem('token', response.data.data.token)
            router.push('/admin/home')
        } else {
            error.value = response.data.message
        }
    })
}

</script>
<template>
    <div class="login">
        <div class="formLogin">
            <form @submit.prevent="login">
               <p class="text-danger" v-if="error">{{ error }}</p>
                <input class="input_auth" type="email" v-model="form.email" placeholder="Enter your Email">
                <br>
                <input class="input_auth" type="password" v-model="form.password" placeholder="Enter your Password">
                <br>
                <input type="submit" value="Login" class="input_auth submit">
            </form>
        </div>
    </div>
</template>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Fira sans', sans-serif;
    font-size: 16px;
}

.login {
    background: #6C5CE7;
    padding: 0;
    margin: 0;
    width: 100%;
    height: 100vh;
}

.formLogin {
    display: flex;
    align-items: center;
    width: 22.8em;
    height: 55em;
    margin: 0 auto 0 auto;
    overflow: hidden;
}

.input_auth {
    background-color: rgba(228, 232, 243, 0.8);
    background-position: 0.5em 0.6em;
    border: none;
    color: rgba(80, 80, 80, 1);
    padding: 0 0 0 4rem;
    margin: 0 0 1em 0;
    width: 20em;
    height: 2.8em;
    outline: none;
    transition: background-color 0.4s;
}

.input_auth:hover {
    background-color: rgba(255, 255, 255, 255);
}
.input_auth:focus {
    background-color: rgba(255, 255, 255, 255);
}

.submit {
    color: rgba(35, 35, 35, 0.8);
    background: rgba(220, 220, 220, 1);
    padding: 0;
    margin: 1em 0 0 5em;
    width: 10em;
    text-transform: uppercase;
    cursor: pointer;
    transition: background-color 0.4s;
}

.submit:hover{
    background: #43467F;
    color: #FFFFFF;
}

.submit:focus{
    background: #43467F;
    color: #FFFFFF;
}

.text-danger {
    color : red;
    font-size: 16px;
}
</style>
