<template>
  <h1>CRM</h1>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="client in clients">
      <th scope="row">{{ client.prenom }}</th>
      <td>{{ client.nom }}</td>
      <td>{{ client.email }}</td>
    </tr>
    </tbody>
  </table>
  <button v-on:click="buttonClick" class="btn btn-primary">Récupérer les clients</button>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      clients: {}
    }
  },
  methods: {
    buttonClick: function () {
      axios.get('http://127.0.0.1:8000/api/clients')
          .then((res) => {
            console.log(res.data)
            this.clients = res.data
            console.log(this.clients)
          })
          .catch((err) => {
            console.log(err)
          })
    },
  }
}
</script>