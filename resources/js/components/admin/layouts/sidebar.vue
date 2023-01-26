<template>
    <!-- Nav Main -->
    <nav class="nav">
        <div class="nav_wrapper">
            <span class="nav_close">
                <i class="fas fa-window-close"></i>
            </span>
            <ul class="nav_list">
                <li class="nav_item">
                    <router-link class="nav_link " :to="{name: 'adminHome'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Home
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{name: 'adminAbout'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            About Us
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{name: 'serviceAdminIndex'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Services
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{name: 'skillAdminIndex'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Skills
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{name: 'educationAdminIndex'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Education
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{name: 'experienceAdminIndex'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Experiences
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{name: 'projectAdminIndex'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Projects
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{ name: 'projectAdminTestimonials'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Testimonial
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{ name: 'adminMessagesIndex'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Messages
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link " :to="{ name: 'adminUser'}">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Users
                        </span>
                    </router-link>
                </li>
                <li class="nav_item">
                    <a class="nav_link " href="#">
                        <span class="nav_link--span--icon">
                            <i class="fas fa-home nav__link--icon"> </i>
                        </span>
                        <span class="nav_link--span--navname">
                            Setting
                        </span>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <!-- End Nav Main -->
</template>
