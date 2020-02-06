<template>
  <div id="app">
    <div class="container">
      <div class="container-item border">
        <contract-component
                :id="1"
                :contract="contract1"
                :key="lastTrail+'1'"
        />
      </div>
      <div class="container-vertical">
        <btn @click="trial">Trail Time!</btn>
      </div>
      <div class="container-item border">
        <contract-component
                :id="2"
                :contract="contract2"
                :key="lastTrail+'2'"
        />
      </div>
    </div>
    <history class="history border"/>
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
      if (this.contract1.points === 0 || this.contract2.points === 0) {
        alert("fulfil parties");
        return;
      }
      this.trialAction({
        contract1: this.contract1,
        contract2: this.contract2,
      });
      this.contract1 = new Contract();
      this.contract2 = new Contract();
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

  .history {
    display: block;
    text-align: center;

    padding: 8px;
    margin: 50px;
  }

  .container {
    display: flex;
    justify-content: space-around;

  }

  .container-vertical {
    justify-content: center;
    align-self: center;
  }

  .border {
    border: 1px solid black;
    border-radius: 4px;
  }
</style>
