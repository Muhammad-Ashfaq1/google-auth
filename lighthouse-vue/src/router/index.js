import { createRouter, createWebHistory } from 'vue-router'
import LoginComponent from '../views/LoginComponent.vue'
import ScorePerformanceComponent from '../views/ScorePerformanceComponent.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: ScorePerformanceComponent,
      meta: { requiresAuth: true },
    },
    {
      path: '/login',
      name: 'LoginView',
      component: LoginComponent,
    },
    

  ]
})
router.beforeEach((to, from, next) => {
  const isAuthenticated = !!localStorage.getItem('token'); // Check for auth token

  if (to.meta.requiresAuth && !isAuthenticated) {
    // Redirect to login if not authenticated
    next({ name: 'LoginView' });
  } else if (to.name === 'LoginView' && isAuthenticated) {
    // Redirect to home if already logged in
    next({ name: 'home' });
  } else {
    next(); // Proceed to the route
  }
});

export default router
