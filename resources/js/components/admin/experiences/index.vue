<script setup>
    import Base from '../layouts/base.vue'
    import { onMounted, ref, toDisplayString  } from 'vue';

    let experiences = ref([])
    const showModal = ref(false)
    const hideModal = ref(true)
    const editMode = ref(false)

    let form = ref({
        company: '',
        period: '',
        position: ''
    })

    onMounted(async () =>{
        getExperiences()
    })

    const getExperiences = async () => {
        let response = await axios.get('/api/get_all_experience')
        experiences.value = response.data.experiences
    }

    const openModal = () => {
        showModal.value = !showModal.value
    }

    const closeModal = () => {
        showModal.value = !hideModal.value
    }

    const createExperience = async () => {
        await axios.post('/api/create_experience', form.value)
        .then(response => {
            getExperiences()
            closeModal()
            toast.fire({
                icon: 'success',
                title: 'Experience add successfully'
            })
        })
    }

    const editExperience = (item) => {
        editMode.value = true
        showModal.value = !showModal.value
        form.value = item
    }

    const updateExperience = async () => {
        await axios.put('/api/update_experience/'+form.value.id, form.value)
        .then(()=>{
            getExperiences()
            closeModal()
            toast.fire({
                icon: 'success',
                title: 'Experience update successfully'
            })
        })
    }

    const deleteExperience = (id) => {
        Swal.fire({
            title: 'Are you sure ?',
            text: 'You can\'t go back',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#D33',
            confirmButtonText: 'Yes, delete it !'
        })
        .then((result) => {
            if (result.value) {
                axios.delete('/api/delete_experience/'+id)
                .then(()=>{
                    Swal.fire(
                        'Delete',
                        'Experience delete successfully',
                        'success'
                    )
                    getExperiences()
                })
            }
        })
    }
</script>
<template>
   <Base/>
   <main class="main">
    <div class="main__sideNav"></div>
    <div class="main__content">
                 <!--==================== EXPERIENCES ====================-->
                 <section class="experiences section" id="experiences">
                <div class="skills_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Experiences </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn" @click="openModal()">
                                New Experience
                            </div>
                        </div>
                    </div>

                    <div class="table">

                        <div class="table_filter">
                            <span class="table_filter-Btn ">
                                <i class="fas fa-ellipsis-h"></i>
                            </span>
                            <div>
                                <ul class="table_filter-list">
                                    <li>
                                        <p class="table_filter-link table_filter-link--active">
                                            All
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="table_search">
                            <div class="table_search-wrapper">
                                <select class="table_search-select" name="" id="">
                                    <option value="">Filter</option>
                                </select>
                            </div>
                            <div class="relative">
                                <i class="table_search-input--icon fas fa-search "></i>
                                <input class="table_search--input" type="text" placeholder="Search Experience">
                            </div>
                        </div>

                        <div class="experience_table-heading">
                            <p>Company</p>
                            <p>Period</p>
                            <p>Position</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <div class="experience_table-items" v-for="item in experiences" :key="item.id" v-if="experiences.length > 0">
                            <p>{{ item.company }}</p>
                            <p>{{ item.period }}</p>
                            <p>{{ item.position }}</p>
                            <div>
                                <button class="btn-icon success" @click="editExperience(item)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn-icon danger" @click="deleteExperience(item.id)">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
                <!-------------- EXPERIENCE MODAL --------------->
                <div class="modal main__modal " :class="{ show: showModal }">
                    <div class="modal__content">
                        <span class="modal__close" @click="closeModal()">×</span>
                        <h3 class="modal__title" v-show="editMode == false">Add Experience</h3>
                        <h3 class="modal__title" v-show="editMode == true">Update Experience</h3>
                        <hr class="modal_line"><br>
                        <form @submit.prevent="editMode ? updateExperience() : createExperience()">
                            <div>
                                <p>Company</p>
                                <input type="text" class="input" v-model="form.company"/>

                                <p>Period</p>
                                <input type="text" class="input" v-model="form.period"/>

                                <p>Position</p>
                                <input type="text" class="input" v-model="form.position"/>

                            </div>
                            <br><hr class="modal_line">
                            <div class="model__footer">
                                <button class="btn mr-2" @click="closeModal()">
                                    Cancel
                                </button>
                                <button class="btn btn-secondary" v-show="editMode == false">Save</button>
                                <button class="btn btn-secondary" v-show="editMode == true">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
    </div>
   </main>
</template>