<template>
  <h1>CRM</h1>
  <div class="container">
    <div class="row">
      <div class="col-4">
        <ul>
          <li v-on:click="changeClient(client)" v-for="client in clients">{{ client.prenom }}</li>
        </ul>
      </div>
      <div class="col-8">
        <h4>Créer une activité pour le client {{ client.prenom }}</h4>
        <form v-on:submit="submit">
          <input name="id_client" type="hidden" :value="client.id" required/>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom</label>
            <input type="name" v-model="name" class="form-control" id="exampleFormControlInput1" placeholder="Ouin ouin" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Date</label>
            <input name="date" v-model="date" type="date" class="form-control" required>
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <textarea name="description" v-model="description" class="form-control" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <table class="table">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <button v-on:click="buttonClick" class="btn btn-primary">Récupérer les clients</button>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      clients: {},
      client: {}
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
    changeClient: function (client) {
      this.client = client
    },
    submit: function (event) {
      event.preventDefault();

      axios.post('http://127.0.0.1:8000/api/clients/create', {
        client_id: this.client.id,
        nom: this.nom,
        date: this.date,
        description: this.description
      })
      .then((res) => {
        console.log(res)
      })
      .catch((error) => {
        console.log(error)
      })
    }
  }
}
</script>