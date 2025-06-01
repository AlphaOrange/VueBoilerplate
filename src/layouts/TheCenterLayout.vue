<!-- This is for displaying a single centered component -->

<template>
  <TheNavigation></TheNavigation>
  <div class="pure-g">
    <div class="pure-u-0 pure-u-md-1-5 pure-u-xl-1-3"></div>
    <div id="content" class="pure-u-1 pure-u-md-3-5 pure-u-xl-1-3">
      <slot></slot>
    </div>
  </div>
</template>

<script>
import TheNavigation from "@/components/TheNavigation.vue";
export default {
  name: "TheCenterLayout",
  components: {
    TheNavigation,
  },
};
</script>

<style scoped>
#content {
  display: flex;
  flex-direction: column;
  height: 100vh;
  padding: 0 0 var(--height-top-nav);
  justify-content: center;
  align-items: center;
}
</style>
