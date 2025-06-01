<template>
  <header
    class="pure-g top-navigation"
    :class="{ extended: isExtended }"
    :style="{ height: navHeight }"
  >
    <div class="pure-u-3-5">
      <div class="pure-g">
        <div class="pure-u-1-5">
          <router-link to="/">
            <img src="/logo.png" alt="Back To Home" class="logo" />
          </router-link>
        </div>
        <div class="pure-u-1 pure-u-md-4-5">
          <div
            class="pure-menu"
            :class="{ 'pure-menu-horizontal': isHorizontal }"
          >
            <ul class="pure-menu-list">
              <li
                class="pure-menu-item"
                v-for="link in authLinks"
                :key="link['name']"
              >
                <router-link class="pure-menu-link" :to="link['route']">
                  {{ link["name"] }}
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="pure-u-2-5">
      <div class="pure-menu pure-menu-horizontal menu-login-out">
        <ul class="pure-menu-list">
          <li class="pure-menu-item" v-if="isAuthenticated">
            <a href="#" class="pure-menu-link" @click.prevent="logout">
              Logout
            </a>
          </li>
          <li class="pure-menu-item" v-else>
            <router-link class="pure-menu-link" to="/auth">Login</router-link>
          </li>
          <li class="pure-menu-item hamburger">
            <a href="#" class="pure-menu-link" @click.prevent="toggleMenu">
              <font-awesome-icon class="icon" :icon="['fa', 'bars']" />
            </a>
          </li>
        </ul>
      </div>
    </div>
  </header>
</template>

<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "TheNavigation",
  data() {
    return {
      isExtended: false,
      isHorizontal: true,
      links: [
        { name: "Home", route: "/welcome", auth: -1 }, // -1: logged out only, 1: logged in onl, 0: show always
        { name: "Home", route: "/", auth: 1 },
        { name: "Impressum", route: "/impressum", auth: 0 },
      ],
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    isAuthenticated() {
      return this.auth.isAuthenticated;
    },
    authLinks() {
      if (this.isAuthenticated) {
        return this.links.filter((link) => link.auth >= 0);
      }
      return this.links.filter((link) => link.auth <= 0);
    },
    extendedHeight() {
      let unfold = this.authLinks.length * 2;
      return "calc(var(--height-top-nav) + " + unfold + "em)";
    },
    navHeight() {
      if (this.isExtended) {
        return this.extendedHeight;
      } else {
        return "var(--height-top-nav)";
      }
    },
  },
  methods: {
    toggleMenu() {
      this.isExtended = !this.isExtended;
      if (this.isExtended) {
        this.isHorizontal = false;
      } else {
        setTimeout(() => {
          this.isHorizontal = true;
        }, 300); // end of CSS transition
      }
    },
    logout() {
      this.auth.logout();
      this.$router.push("/auth");
    },
  },
};
</script>

<style scoped>
.logo {
  height: calc(var(--height-top-nav) * 0.8);
  width: auto;
  margin-left: 1em;
}

.top-navigation {
  position: fixed;
  z-index: 1000;
  top: 0;
  left: 0;
  height: var(--height-top-nav);
  width: 100%;
  padding: 0.25em 0 0;
  background: var(--col-nav-bg);
  overflow: hidden;
  transition: height 0.3s ease-in-out;
  color: var(--col-nav-text);
}
.menu-login-out {
  text-align: right;
}

.pure-menu-link {
  height: 2em;
}
.pure-menu-active > .pure-menu-link,
.pure-menu-link:focus,
.pure-menu-link:hover {
  background-color: transparent;
  color: var(--col-nav-text-hover);
}

@media (min-width: 48em) {
  /* md */
  .pure-menu-item.hamburger {
    display: none;
  }
}
</style>
