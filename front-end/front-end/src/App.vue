<template>
  <div>
    <h1>Bo-do List</h1>
    <ul>
      <li v-for="(task, index) in tasks" :key="index">
      {{ task.name }} {{ task.state }}
      </li>
    </ul>
    <form @submit.prevent="onSubmit">
      <label for="name">What's next?  </label>
      
      <input type="text" name="name" id="name" v-model="newTask.name">
      <input type="submit" value="AGGIUNGI LA TUA TASK!">
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default{
  data(){
    return{
      tasks: [],
      newTask: {
        name: "",
        state: "todo"
      }
    }
  },
  methods: {
    onSubmit(){
      
      const url = 'http://localhost:8888/php-todo-list-json/back-end/creaTask.php';
      const data = this.newTask;
      const testata = {
        headers: { 'Content-Type' : 'multipart/form-data'}
      };

      axios.post(url, data, testata)
      .then(risultato => console.log("risultato", risultato.data))
      .catch(error => console.error("error", error));
    }
  },
  mounted(){
    axios.get('http://localhost:8888/php-todo-list-json/back-end/index.php')
      .then(risultato => {
        this.tasks = risultato.data;
      })
  }
};
</script>