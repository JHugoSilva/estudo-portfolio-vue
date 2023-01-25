<script setup>
import Base from '../layouts/base.vue'
import { onMounted, ref } from 'vue'

let messages = ref([])

onMounted(async()=>{
    getMessages()
})

const getMessages = async () => {
    let response = await axios.get('/api/get_all_message');
    messages.value = response.data.messages
}

const updateStatus = (id, status) => {

    const formData = new FormData()
    formData.append('status', status)
    formData.append('_method', 'put')

    axios.post('/api/change_status/'+id, formData)
    .then(response => {
        toast.fire({
            icon: 'success',
            title: 'Status change Successfully'
        })
        getMessages()
    })
}

const deleteMessage = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You can\'t go back',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085D6',
        cancelButtonColor: '#D33',
        confirmButtonText: 'Yes, delete it'
    })
    .then((result)=>{
        if (result.value) {
            axios.delete('/api/delete_message/'+id)
            .then(()=>{
                Swal.fire(
                    'Delete',
                    'Message delete successfully',
                    'success'
                )
                getMessages()
            })
        }
    })
}
</script>
<template>
    <Base/>
   <main class="main">
    <div class="main__sideNav">

    </div>
    <div class="main__content">
                   <!--==================== MESSAGES ====================-->
                   <section class="messages section" id="messages">
                <div class="messages_container">
                    <div class="titlebar">
                        <div class="titlebar_item">
                            <h1>Messages </h1>
                        </div>
                        <div class="titlebar_item">

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
                                <input class="table_search--input" type="text" placeholder="Search Message">
                            </div>
                        </div>

                        <div class="message_table-heading">
                            <p>Name</p>
                            <p>Email</p>
                            <p>Subject</p>
                            <p>Description</p>
                            <p>Status</p>
                            <p>Actions</p>
                        </div>
                        <!-- item 1 -->
                        <div class="message_table-items" v-for="item in messages" :key="item.id" v-if="messages.length > 0">
                            <p>{{ item.name }}</p>
                            <p>{{ item.email }}</p>
                            <p>{{ item.subject }}</p>
                            <p>{{ item.description }}</p>
                            <p>
                                <span class="badge_read" @click="updateStatus(item.id, 0)" v-if="item.status == 1">
                                    Read
                                </span>
                                <span class="badge_unread" @click="updateStatus(item.id, 1)" v-else>
                                    Unread
                                </span>
                            </p>
                            <div>
                                <button class="btn-icon danger" @click="deleteMessage(item.id)">
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

