<template>
  <div>
    <h1>Hello World!</h1>
  </div>
</template>

<script>
import axios from 'axios';

export default{
  mounted(){
    axios.get('http://localhost:8888/php-todo-list-json/back-end')
      .then(risultato => {
        console.log(JSON.stringify(risultato))
      })
  }
};
</script>