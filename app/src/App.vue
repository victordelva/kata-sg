<template>
  <div id="app">
    <contract-component
            :id="1"
            :contract="contract1"
            :key="lastTrail+'1'"
    />
    <btn @click="trial">Trail Time!</btn>
    <contract-component
            :id="2"
            :contract="contract2"
            :key="lastTrail+'2'"
    />

    <history/>
  </div>
</template>

<script>
import ContractComponent from './components/Contract'
import Btn from "./components/Btn";
import Contract from "./Domain/Contract";
import { mapActions } from 'vuex';
import History from "./components/History";
export default {
  name: 'app',
  components: {
    History,
    "contract-component": ContractComponent,
    Btn,
  },
  data: function() {
    return {
      contract1: new Contract(),
      contract2: new Contract(),
      lastTrail: 0,
    }
  },
  methods: {
    ...mapActions('trials', [
      'trialAction',
    ]),
    trial: function () {
      let self = this;
      this.trialAction({
        contract1: this.contract1,
        contract2: this.contract2,
      });
      self.lastTrail += 1;
    }
  }
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
