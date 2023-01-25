<script setup>
import Base from '../layouts/base.vue'
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

let form = ref({
    name: '',
    function: '',
    testinomy: '',
    rating: '',
    photo: ''
})

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
        let limit = 1024*1024*2
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

    const saveTestimonial = async () => {
        await axios.post('/api/add_testimonial', form.value)
        .then((response) => {
            router.push({ name: 'projectAdminTestimonials'})
            toast.fire({
                icon: 'success',
                title: 'Testimonial add Successfully'
            })
        })
    }
</script>
<template>
    <Base/>
    <main class="main">
        <div class="main__sideNav"></div>
        <div class="main__content">
            <!--===================ADD TESTIMONIAL ====================-->
            <section class="about section" id="testimonial">
                <div class="about_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Add Testimonial</h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn-secondary"  @click="saveTestimonial()">
                                Save Testimonial
                            </div>
                        </div>
                    </div>
                    <div class="card_wrapper">
                        <div class="wrapper_left">
                            <div class="card">

                                <p>Name</p>
                                <input type="text" class="input" v-model="form.name"/>

                                <p>Function</p>
                                <input type="text" class="input" v-model="form.function"/>

                                <p>Testimony</p>
                                <textarea cols="10" rows="5" v-model="form.testinomy"></textarea>

                            </div>
                        </div>

                        <div class="wrapper_right ">
                            <div class="card">
                                <p>Photo</p>
                                <div class="testimonial_img-container">
                                    <img :src="getPhoto()" alt="" class="testimonial_img">
                                </div>
                                <input type="file" id="fileimg" @change="changePhoto"/>
                                <br>
                                <p>Rating ?/5</p>
                                <input type="text" class="input" v-model="form.rating"/>
                            </div>
                        </div>

                    </div>
                    <div class="titlebar">
                        <div class="titlebar_item">

                        </div>
                        <div class="titlebar_item">
                            <div class="btn btn-secondary" @click="saveTestimonial()">
                                Save Testimonial
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
</template>