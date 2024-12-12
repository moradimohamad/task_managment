import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = 'http://localhost:8000';

const token=localStorage.getItem('token');

if (token){
    window.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
}

