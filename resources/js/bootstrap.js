import 'bootstrap';

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
import $ from 'jquery';

//Importamos el complemento que instalamos imask
import Imask from 'imask';

//Importamos el complemento que instalamos Dropzone
import Dropzone from 'dropzone';

//Importamos el complemento SweetAlert2
import Swal from 'sweetalert2';

//Importamos tom-select
import TomSelect from 'tom-select';

import DataTable from 'datatables.net-dt';
import 'datatables.net-buttons-dt';
import 'datatables.net-responsive-dt';
import 'datatables.net-buttons-bs5';
import 'datatables.net-searchpanes-bs5';
import 'datatables.net-select-bs5';
import 'datatables.net-searchbuilder-bs5';

/* import 'datatables.net-buttons/js/buttons.html5.js'; */
/* import 'datatables.net-buttons/js/buttons.print.js'; */
/* import 'datatables.net-buttons/js/dataTables.buttons.js'; */
/* import 'datatables.net-buttons/js/buttons.colVis.js'; */
/* import 'datatables.net-buttons/js/buttons.flash.js'; */
/* import 'datatables.net-buttons/js/buttons.bootstrap5.js'; */

window.axios = axios;

window.$ = $;

//Aqui le decimos que lo use en el documento
window.Imask = Imask;

window.Dropzone = Dropzone;

//DataTables
window.DataTable = DataTable;

//SweetAlert
window.Swal = Swal;

//TomSelect
window.TomSelect = TomSelect;


window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['ngrok-skip-browser-warning'] = 'true';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
