import axios from "axios";

const apiUrl = 'http://127.0.0.1:8000/api'
const pandusiwiAPI = 'https://production.pandulogistics.com/pandu/restapi/basic/city/list'

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

export const get_data_city = async (endpoint) => {
    try {
      const response = await axios.get(`${apiUrl}/${endpoint}`);
      return response.data;
    } catch (error) {
      throw error;
    }
};

export const get_data_service = async (endpoint) => {
    try {
      const response = await axios.get(`${apiUrl}/${endpoint}`);
      return response.data;
    } catch (error) {
      throw error;
    }
};

export const add_data_pickup = async (endpoint,payload) => {
    try {
      const response = await axios.post(`${apiUrl}/${endpoint}`, payload);
      return response.data;
    } catch (error) {
      throw error;
    }
};

export const getCoverageArea = async (endpoint,payload) => {
    try {
        const param = {
            city_name: 'DEPOK',
            prov_name: 'JAWA BARAT'
        }
      const response = await axios.get(`${apiUrl}/tes`,{
        params: param,
      }
      );
      console.debug('response',response)
      return response;
    } catch (error) {
      throw error;
    }
};

export const getTrackingById = async (endpoint,payload) => {
    try {
        const param = {
            id: '13486890172',
        }
      const response = await axios.get(`${apiUrl}/get-tracking`,{
        params: param,
      }
      );
      console.debug('tracking',response)
      console.error('tracking',JSON.parse(response.data.data))
      return response;
    } catch (error) {
      throw error;
    }
};
