import { createRouter, createWebHashHistory } from "vue-router";
import WelcomeView from "@/views/WelcomeView.vue";
import HomeView from "@/views/HomeView.vue";
import ImpressumView from "@/views/ImpressumView.vue";
import AuthView from "@/views/AuthView.vue";
import { useAuthStore } from "@/store/auth";

const routes = [
  {
    path: "/welcome",
    name: "Welcome",
    component: WelcomeView,
  },
  {
    path: "/",
    alias: ['/home'],
    name: "Home",
    component: HomeView,
    meta: { requiresAuth: true },
  },
  {
    path: "/auth",
    name: "Auth",
    component: AuthView,
  },
  {
    path: "/impressum",
    name: "Impressum",
    component: ImpressumView,
  },
];

const router = createRouter({
  history: createWebHashHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  const authStore = useAuthStore();
  if (to.meta.requiresAuth && !authStore.isAuthenticated) {
    next("/auth");
  } else {
    next();
  }
});

export default router;
