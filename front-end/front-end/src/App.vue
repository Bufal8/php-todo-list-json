<script>
  import axios from "axios";
  export default {
    data() {
      return{
        todolist: [],
        newTasks: {
          task: "",
          done: false
        }
      }
    },
    methods: {      
      onSubmit() {

        if(!this.newTasks.task) {return}

        // trasformo dei dati necessari in variabili per ordine
        const headers = {
          headers: {"Content-Type": "multipart/form-data"}
        };
        const data = this.newTasks;
        const url = "http://localhost:8888/php-todo-list-json/back-end/creaTask.php";

        // chiamata axios col post
        axios.post(url, data, headers)
        // mi ritorna nel response ciò che ho scritto nel postTask.php
        .then(response => {
          
          this.todolist = response.data;
          // this.newTasks = "";
          }
        )
        this.newTasks.task = "";

      },
      changeDone() {

        if(this.newTasks.done) {
          this.newTasks.done = false;
        } else{
          this.newTasks.done = true;
        }
      },
      deleteTask(index) {
      
      const url = 'http://localhost:8888/php-todo-list-json/back-end/cancellaTask.php';
      const data = {"index": index};
      const headers = {
          headers: { 'Content-Type': 'multipart/form-data' } 
      };

      axios.post(url, data, headers)
           .then(response => {
            this.todolist = response.data;
           });
    }      
    },
    mounted() {
      axios.get("http://localhost:8888/php-todo-list-json/back-end/index.php")
        .then(
          response => {
            this.todolist = response.data;
          }
        )
    }
  }
</script>

<template>

  <main>

    <h1>
      TO DO LIST
    </h1>

    <div class="todo">
        <ul>
          <li v-for="(todoItem, listidx) in todolist" :key="listidx"
          :class="(todoItem.done) ? 'true' : '' "
          @click="changeDone"
          >
            {{ todoItem.task }}

            <button type="button" @click="deleteTask(i)">
              X
            </button>

          </li>

        </ul>
    </div>

    <form @submit.prevent="onSubmit">

      <input type="text" id="task" v-model="newTasks.task">
      <input type="submit" value="ADD TASK">

    </form>
    
  </main>
  
</template>