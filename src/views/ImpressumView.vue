<template>
  <ThePageLayout>
    <template #default>
      <div>
        <h1>Impressum & Info</h1>
        <h2>Über uns</h2>
        <p>TBD</p>
        <h2>Impressum</h2>
        <h3>Angaben gemäß § 5 TMG</h3>
        <p>
          Stefan Tewes<br />
          Wichheimer Straße 159a<br />
          51067 Köln
        </p>
        <h3>Kontakt</h3>
        <p>
          Telefon: 0176/23470864<br />
          E-Mail: admin@alphaorange.de
        </p>
        <h3>Redaktionell verantwortlich</h3>
        <p>Stefan Tewes</p>
        <h2>Datenschutzhinweise</h2>
        <p>TBD</p>
        <h2>AI Agenda</h2>
        <p>TBD</p>
      </div>
    </template>
  </ThePageLayout>
</template>

<script>
import ThePageLayout from "@/layouts/ThePageLayout.vue";

export default {
  name: "ImpressumView",
  components: {
    ThePageLayout,
  },
};
</script>

<style scoped></style>
