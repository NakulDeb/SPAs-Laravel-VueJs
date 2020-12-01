import router from '../../router';
import store from '../../store';
const state = {
    user: { },
};

const getters = {};
const actions = {
    getUser({commit}){
        commit('setUser', JSON.parse(localStorage.getItem("user")));
    },

    resetUser({commit}){
        commit('setUser', '');
    },

    login({}, user){
        axios.post('/api/login', { email: user.email, password: user.password })
        .then(response => {
            if(response.data.access_token.length > 0){
                localStorage.setItem("user", JSON.stringify(response.data.user));
                localStorage.setItem("access_token", response.data.access_token);
                Toast.fire({icon: 'success', title: 'Login Successful!'});
                store.dispatch('currentUser/getUser');
                router.push(user.redirect_location);
            }
        }).catch(errors => {Toast.fire({icon: 'error', title: errors.message}) });
    },

    register({}, user){
        axios.post('/api/register', { name: user.name, email: user.email, password: user.password })
            .then(response => {
                if(response.data.access_token){
                    localStorage.setItem("user", JSON.stringify(response.data.user));
                    localStorage.setItem("access_token", response.data.access_token);
                    Toast.fire({icon: 'success', title: 'Registration Successful!'})
                    store.dispatch('currentUser/getUser');
                    router.push(user.redirect_location);
                }
        }).catch(errors => { Toast.fire({icon: 'warning', title: 'Something wrong!' }) });
    }
};
const mutations = {
    setUser(state, data){
        state.user = data;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
