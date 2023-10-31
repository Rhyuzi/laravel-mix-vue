import { get_data_tracking, get_data_resi} from '../../api/api_helpers'

const initialState = () => {
    return {
        tracking: [],
        resi: []
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
        getDataTracking: (state) => state.tracking,
        getResi: (state) => state.resi,
    },
    actions: {
        getDataTracking: async function ({commit}, payload) {
           const result = await get_data_tracking('get-tracking-id',payload)
           commit('SET', ['tracking', result.data.data])
           return result
        },
        getDataResiById: async function ({commit}, payload) {
            const result = await get_data_resi('get-resi',payload)
            commit('SET', ['resi', result.data.data])
            return result
        },
        // putDataResi: async function ({commit}, payload) {
        //     commit('SET', ['resi', payload])
        // }
    },
}
