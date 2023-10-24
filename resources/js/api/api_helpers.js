import axios from "axios";

const apiUrl = 'http://127.0.0.1:8000/api'

export const account_login = async (endpoint,payload) => {
    try {
      const response = await axios.post(`${apiUrl}/${endpoint}`, payload);
      return response.data;
    } catch (error) {
      throw error;
    }
};

export const get_data_pickup = async (endpoint) => {
    try {
        const param = {
            customer_id: JSON.parse(localStorage.Users).customer_id
        }
        console.error(param)
      const response = await axios.get(`${apiUrl}/${endpoint}?customer_id=${param.customer_id}`);
      return response.data;
    } catch (error) {
      throw error;
    }
  };
