import axios from 'axios';
import Trial from "../../Domain/Trial";

const trials = {
    namespaced: true,
    name: 'trials',
    state: {
        history: [],
    },
    mutations: {
        addTrial(state, trial) {
            state.history.push(trial.toObject);
        }
    },
    actions: {
        trialAction(context, {contract1, contract2}) {
            let trial = new Trial(contract1, contract2);
            context.commit("addTrial", trial);
            return axios.post('http://0.0.0.0:8000/api/trials/' + contract1.rolesString + '/' + contract2.rolesString);
        }
    },
    getters: {
        history: state => {
            return state.history;
        }
    }
};

export default trials;