<template>
  <div class="container">
    <h2 class="text-center">All Members</h2>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Report Subject</th>
          <th>Photo</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="profile in profiles" :key="profile.id">
          <td>{{ profile.id }}</td>
          <td>{{ profile.user.firstName }} {{ profile.user.lastName }}</td>
          <td>{{ profile.user.reportSubject }}</td>
          <td>
            <img
              v-if="profile.photo === null"
              src="https://via.placeholder.com/100"
              class="img-thumbnail"
            />
            <img
              v-else
              :src="'/storage/' + profile.photo"
              class="img-thumbnail"
            />
          </td>
          <td>
            <a href="mailto:">{{ profile.user.email }}</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "ListProfiles",
  data() {
    return {
      profiles: {},
    };
  },
  mounted() {
    axios.get("api/allprofiles").then((response) => {
      this.profiles = response.data;
      console.log(this.profiles);
    });
  },
};
</script>

<style scoped>
img {
  height: 100px;
  width: 100px;
}
</style>