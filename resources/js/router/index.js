import { createRouter, createWebHistory } from 'vue-router';

//ADMIN
import homeAdminIndex from '../components/admin/home/index.vue';
import aboutAdminIndex from '../components/admin/about/index.vue';
import serviceAdminIndex from '../components/admin/services/index.vue';
import skillAdminIndex from '../components/admin/skills/index.vue';
import educationAdminIndex from '../components/admin/educations/index.vue'
import experienceAdminIndex from '../components/admin/experiences/index.vue'
import projectAdminIndex from '../components/admin/projects/index.vue'
import projectAdminNew from '../components/admin/projects/new.vue'
//PAGES
import homePageIndex from '../components/pages/home/index.vue';
//NOT FOUND
import notFound from '../components/notFound.vue';
//LOGIN
import login from '../components/auth/login.vue';

const routes = [
    {
        path: '/login',
        component: login,
        name: 'Login',
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/',
        component: homePageIndex,
        name: 'Home',
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound,
        name: 'notFound',
        meta: {
            requiresAuth: false
        }
    },
    {
        path: '/admin/home',
        component: homeAdminIndex,
        name: 'adminHome',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/about',
        name: 'adminAbout',
        component: aboutAdminIndex,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/service',
        component: serviceAdminIndex,
        name: 'serviceAdminIndex',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/education',
        component: educationAdminIndex,
        name: 'educationAdminIndex',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/skills',
        component: skillAdminIndex,
        name: 'skillAdminIndex',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/experiences',
        component: experienceAdminIndex,
        name: 'experienceAdminIndex',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/projects',
        component: projectAdminIndex,
        name: 'projectAdminIndex',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/projects/new',
        component: projectAdminNew,
        name: 'projectAdminNew',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/projects/edit/:id',
        component: () => import('../components/admin/projects/edit.vue'),
        name: 'projectAdminEdit',
        props: true,
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/testimonials',
        component: () => import('../components/admin/testimonials/index.vue'),
        name: 'projectAdminTestimonials',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/testimonials/new',
        component: () => import('../components/admin/testimonials/new.vue'),
        name: 'adminTestimonialsNew',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/testimonials/edit/:id',
        component: () => import('../components/admin/testimonials/edit.vue'),
        props: true,
        name: 'adminTestimonialsEdit',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/messages/index',
        component: () => import('../components/admin/messages/index.vue'),
        name: 'adminMessagesIndex',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/users/index',
        component: () => import('../components/admin/users/index.vue'),
        name: 'adminUser',
        meta: {
            requiresAuth: true
        }
    },
    {
        path: '/admin/users/profile',
        component: () => import('../components/admin/users/profile.vue'),
        name: 'adminUserProfile',
        meta: {
            requiresAuth: true
        }
    }
];

const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: 'nav__active',
    routes
})

router.beforeEach((to, from)=>{
    if (to.meta.requiresAuth && !localStorage.getItem('token')) {
        return {name: 'Login'}
    }
    if (to.meta.requiresAuth == false && localStorage.getItem('token')) {
        return {name: 'adminHome'}
    }

})

export default router
