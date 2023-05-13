import $ from 'jquery';
window.$ = $;

window.$.ajaxSetup({
    headres: {
        'X-CSRF-TOKEN': $('meta[name="csfr-token"]').attr('content')
    }
})


import './bootstrap';