<template>
  <div>
    <h1>Bo-do List</h1>
    <ul>
      <li v-for="(cosaDaFare, index) in coseDaFare" :key="index">
      {{ cosaDaFare.name }} {{ cosaDaFare.state }}
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';

export default{
  data(){
    return{
      coseDaFare: []
    }
  },
  mounted(){
    axios.get('http://localhost:8888/php-todo-list-json/back-end/')
      .then(risultato => {
        this.coseDaFare = risultato.data;
      })
  }
};
</script>