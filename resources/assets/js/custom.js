$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    $('.gif-datatable').DataTable({});

    $(".select2").select2();

    tinymce.init({
        selector: '.gif-textarea',
        height: 200,
        theme: 'modern'
    });
 });