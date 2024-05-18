import axios from 'axios';
import Alpine from 'alpinejs'
import mask from '@alpinejs/mask'

//Axios
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

//Alpine
window.Alpine = Alpine
Alpine.plugin(mask)
Alpine.start()
