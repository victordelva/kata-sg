<template>
  <div class="contract">
    <div>Party {{id}}: </div>
    <div class="roles">
      <btn @click="addRole('K')">Add K</btn>
      <btn @click="addRole('N')">Add N</btn>
      <btn @click="addRole('V')">Add V</btn>
      <btn @click="reset">Reset</btn>
    </div>
    <div>Contract</div>
    <input type="text" disabled :value="roles"/>
    <div>Party {{id}} has {{contract.points}} points</div>
  </div>
</template>

<script>
  import Btn from "./Btn";
  import Contract from '../Domain/Contract';

  export default {
    name: 'Contract',
    components: {
      Btn,
    },
    props: {
      id: Number,
      contract: Contract,
    },
    computed: {
    },
    data: function() {
      return {
        roles: '',
      }
    },
    methods: {
      addRole: function (role) {
        this.roles += role;
      },
      reset: function () {
        this.roles = '';
      }
    },
    watch: {
      roles: function (newVal) {
        this.contract.roles = newVal;
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
