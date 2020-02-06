<template>
  <div id="app">
    <contract-component
            :id="1"
            :contract="contract1"
    />
    <btn>Trail Time!</btn>
    <contract-component
            :id="2"
            :contract="contract2"
    />
  </div>
</template>

<script>
import ContractComponent from './components/Contract'
import Btn from "./components/Btn";
import Contract from "./Domain/Contract";

export default {
  name: 'app',
  components: {
    "contract-component": ContractComponent,
    Btn,
  },
  data: function() {
    return {
      contract1: new Contract(),
      contract2: new Contract(),
    }
  },
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
