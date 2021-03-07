$(document).ready(() => {
    var selectedTab = localStorage.getItem('selectedTab');
    if (selectedTab) {
        $('.form-tabs li.is-active').removeClass('is-active');
        $('.form-tab-content.tab-content').removeClass('is-active');

        $('.form-tabs li[data-tab = ' + selectedTab + ']').addClass('is-active');
        $('.form-tab-content#' + selectedTab).addClass('is-active');
    }
});
