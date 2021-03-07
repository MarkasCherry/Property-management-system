require('./bootstrap');

require('alpinejs');

$(document).ready(function () {
    let notyf = new Notyf();

    window.livewire.on('alert', param => {
        notyf.open({
            type: param['type'],
            message: param['message'],
            dismissible: true,
            duration: 5000,
            position: {x: 'right', y: 'top'}
        });
    });
});
