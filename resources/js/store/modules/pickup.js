import { get_data_pickup, add_data_pickup } from '../../api/api_helpers'

const initialState = () => {
    return {
        pickups: []
    }
}

export default {
    namespaced: true,
    state: initialState(),
    mutations: {
        PUSH: function (state, [key, value]) {
            state[key].push(value)
        },
        SET: (state, [key, value]) => state[key] = value,
        FILTER: (state, [key, value]) => state[key] = state[key].filter(item => item.sipAccount != value),
        DELETE: (state, [key, value]) => state[key].splice(state[key].findIndex(item => item.sipAccount == value), 1),
        RESET: (state) => Object.assign(state, initialState()),
        UNSHIFT(state, [key, value]) {
            state[key].unshift(value);
          },
    },
    getters: {
        getDataPickups: (state) => state.pickups,
    },
    actions: {
        getDataPickup: async function ({commit}, payload) {
           const result = await get_data_pickup('pickup-order')
        //    console.debug('data pickup',result)
           commit('SET', ['pickups', result.data])
        },
        addDataPickup: async function ({commit}, payload) {
            const result = await add_data_pickup('add-pickup-order', payload)
            commit('UNSHIFT', ['pickups', result.data])

            console.debug('data updated', this.getDataPickup)
            return result
        }
    },
}
