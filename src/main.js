import { createApp } from "vue";
import { createPinia } from "pinia";
import App from "@/App.vue";
import router from "@/router";
import { useAuthStore } from "@/store/auth";

import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import "purecss/build/pure-min.css";
import "purecss/build/grids-responsive-min.css";
import "@/styles/main.css";

// Add Font Awesome Icons
import { faBars } from '@fortawesome/free-solid-svg-icons'
library.add(faBars)

// Load Utilities
import * as utils from '@/utils';

// Create App
(async () => {
  const app = createApp(App);
  app.config.globalProperties.$utils = utils;

  const pinia = createPinia();
  app.use(pinia);

  const auth = useAuthStore();
  await auth.fetchSession(); // wait for authentification

  app.use(router);
  app.component('font-awesome-icon', FontAwesomeIcon);
  app.mount("#app");
})();






