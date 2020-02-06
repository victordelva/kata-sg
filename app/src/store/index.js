import Vue from 'vue';
import Vuex from 'vuex';
import trials from "./modules/trials";
import VuexPersist from 'vuex-persist';

Vue.use(Vuex);

const vuexLocalStorage = new VuexPersist({
  key: 'vuex', // The key to store the state on in the storage provider.
  storage: window.localStorage, // or window.sessionStorage or localForage
});

export default new Vuex.Store({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    trials,
  },
  plugins: [vuexLocalStorage.plugin]
})
