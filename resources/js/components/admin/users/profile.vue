<script setup>
import Base from '../layouts/base.vue'
import { onMounted, ref } from 'vue'

let form = ref({
    name: '',
    email: '',
    password: '',
    bio: '',
    photo: '',
    type: ''
})

onMounted(async () => {
    getProfile()
})

const getProfile = async () => {
    let response = await axios.get('/api/profile')
    form.value = response.data
}
const getPhoto = () => {
    let photo = "/img/upload/avatar.jpg"
    if (form.value.photo) {
        if (form.value.photo.indexOf('base64') != -1) {
            photo = form.value.photo
        } else {
            photo = '/img/upload/'+form.value.photo
        }
    }

    return photo
}

const changePhoto = (e) => {
    let file = e.target.files[0]
    let reader = new FileReader()
    let limit = 1024 * 1024 * 2
    if (file['size'] > limit) {
        swal({
            icon: 'error',
            title: 'Ooops...',
            text: 'You are uploading a large file'
        })
        return false
    }

    reader.onloadend = (file) => {
        form.value.photo = reader.result
    }
    reader.readAsDataURL(file)
}

const updateProfile = async () => {
    await axios.post(`/api/update_profile/${form.value.id}`, form.value)
    .then(response => {
        toast.fire({
            icon: 'success',
            title: 'Profile Update Successfully'
        })
    })
}

</script>
<template>
    <Base />
    <main class="main">
        <div class="main__sideNav"></div>
        <div class="main__content">

            <!--==================== PROFILE ====================-->
            <section class="about section" id="about">
                <div class="about_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>My Profile</h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn-secondary" @click="updateProfile()">
                                Save Changes
                            </div>
                        </div>
                    </div>
                    <div class="card_wrapper">
                        <div class="wrapper_left">
                            <div class="card">
                                <p>Full Name</p>
                                <input type="text" class="input" v-model="form.name" />

                                <p>Email</p>
                                <input type="email" class="input" v-model="form.email" />

                                <p>Experience (optional)</p>
                                <textarea cols="10" rows="5" v-model="form.bio"></textarea>

                                <p>Password (leave blank if you don't want to change)</p>
                                <input type="password" class="input" v-model="form.password" />
                            </div>
                        </div>

                        <div class="wrapper_right ">
                            <div class="card">
                                <div class="avatar_profile">
                                    <img :src="getPhoto()" alt="" class="avatar_profile_img">
                                </div>
                                <input type="file" id="fileimg" @change="changePhoto" />
                            </div>
                        </div>

                    </div>
                    <div class="titlebar">
                        <div class="titlebar_item">

                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn-secondary" @click="updateProfile()">
                                Save Changes
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>