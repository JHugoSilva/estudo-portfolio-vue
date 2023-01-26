<script setup>
    import { ref, onMounted } from 'vue'
    import { useRouter } from 'vue-router';

    const router = useRouter();
    const showNavHeader = ref(false)
    const nameUser = ref('')

    const openNavHeader = () => {
        showNavHeader.value = !showNavHeader.value
    }

    onMounted(async () => {
        getUserName()
    })

    const logout = () => {
        localStorage.removeItem('token')
        router.push('/')
    }

    const myProfile = () => {
        router.push({name: 'adminUserProfile'})
    }

    const getUserName = async () => {
        let response = await axios.get('/api/get_user_name')
        nameUser.value = response.data.name
    }
</script>
<template>
    <!--==================== HEADER ====================-->
    <!-- Header -->
    <header class="header" id="header">
        <div class="header_logo ">
            <i class="header_collapse-btn fas fa-align-left"></i>
            <img class="logo_img" src="assets/img/logo.png" alt="greatweb" />
        </div>
        <div class="header_search">
            <i class="header_search-icon fas fa-search"></i>
            <input class="header_search-input" type="text" placeholder="Search" />
        </div>
        <div class="header_profile" @click="openNavHeader">
            <div class="header_profile-imgWrapper ">
                <img class="header_profile-img" src="assets/img/avatar.jpg" alt="" />
            </div>
            <p class="header_profile-name">
                {{ nameUser }}
            </p>

        </div>
        <div class="nav__btns">
            <!--====== THEME CHANGE BUTTON ======-->
            <i class="uil uil-moon change-theme" id="theme-button"></i>

            <div class="nav__toggle" id="nav-toggle">
                <i class="uil uil-apps "></i>
            </div>
        </div>
    </header>
    <!-- End Header -->

    <!-- Header Profile -->
    <div>
        <span class="header_profile-name--nav" v-bind:class="{show:showNavHeader}">
            <span class="header_profile-name--nav--pointer">
                <i class="fas fa-sort-up"></i>
            </span>
            <ul class="header_profile-name--nav--list">
                <li class="header_profile-name--nav--item">
                    <a class="header_profile-name--nav--link" href="#" @click="myProfile()">
                        Profile
                    </a>
                </li>
                <li class="header_profile-name--nav--item">
                    <a class="header_profile-name--nav--link" href="#">
                        Message
                    </a>
                </li>
                <li class="header_profile-name--nav--item">
                    <a class="header_profile-name--nav--link" href="#" @click="logout">
                        Logout
                    </a>
                </li>
            </ul>
        </span>
    </div>
    <!-- End Profile Header -->
</template>
