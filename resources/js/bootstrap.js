import axios from 'axios';
import jquery from 'jquery';


window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.$ = jquery;