import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    
    {
      path: '/',
      name: 'login',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/landing',
      name: 'landing',
      component: () => import('../views/LandingView.vue')
    },

    {
      path: '/location',
      name: 'location',
      component: () => import('../views/LocationView.vue')
    },
  ]
})

// restrictions on the landing page if the user is not logged in.
router.beforeEach((to, from) => {
  if(to.name === 'login'){
    return true
  }
  if (to.name !== 'login'){
   if(UserAuthenticated())
    {
      return true
    }
  }


})


// This method  is used to check the user's token in the local storage.
// If the token is not valid, the user is redirected to the login page.
const UserAuthenticated = () => {
  axios.get('http://127.0.0.1:8000/api/user', {
    headers: {
      Authorization: `Bearer ${localStorage.getItem('token')}`
    }
  })
    .then((response) => {})
    .catch((error) => {
      localStorage.removeItem('token')
      router.push({ name: 'login' })
    }
    )

}

export default router


