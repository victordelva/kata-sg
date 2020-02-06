import axios from 'axios';

const trials = {
    state: {
        trials: [],
    },
    mutations: {  },
    actions: {
        trialAction (context, {contract1, contract2}) {
            return axios.get('http://0.0.0.0:8000/api/contracts/knv/NNV/trial').then(function (data) {
                console.log(data);
            });
        }
    }
};

export default trials;