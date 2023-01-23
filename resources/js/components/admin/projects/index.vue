<script setup>
import Base from '../layouts/base.vue'
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()

let projects = ref([])

onMounted(async () => {
    getProjects()
})

const getProjects = async () => {
    let response = await axios.get('/api/get_all_project')
    projects.value = response.data.projects
}

const ourImage = (img) => {
    return '/img/upload/'+img
}

const newProject = () => {
    router.push('/admin/projects/new')
}

const onEdit = (id) => {
    router.push({name: 'projectAdminEdit', params: { id:id } })
}

const deleteProject = () => {
    Swal.fire({

    })
}

</script>
<template>
    <Base/>
    <main class="main">
        <!-- Side Nav Dummy-->
        <div class="main__sideNav"></div>
        <!-- End Side Nav -->
        <!-- Main Content -->
        <div class="main__content">
            <section class="projects section" id="projects">
                <div class="skills_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Projects </h1>
                        </div>
                        <div class="titlebar_item">
                            <div class="btn" @click="newProject()">
                                New Project
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
                                <input class="table_search--input" type="text" placeholder="Search Project">
                            </div>
                        </div>

                        <div class="project_table-heading">
                            <p>Image</p>
                            <p>Title</p>
                            <p>Description</p>
                            <p>Link</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <div class="project_table-items" v-for="item in projects" :key="item.id" v-if="projects.length > 0">
                            <p>
                                <img :src="ourImage(item.photo)" alt="" class="project_img-list">
                            </p>
                            <p>{{ item.title }}</p>
                            <p>{{ item.description }}</p>
                            <p>{{ item.link }}</p>
                            <div>
                                <button class="btn-icon success" @click="onEdit(item.id)">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button class="btn-icon danger" @click="deleteProject(item.id)">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
        </div>
    </main>
</template>
