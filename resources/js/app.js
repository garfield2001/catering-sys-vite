import './bootstrap';

$(function () {
    // Handler for navigation links click event
    $(document).on('click', 'a.link', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        loadContent(url);
        window.history.pushState({ path: url }, '', url); // Update browser history
    });
    // Handler for browser back/forward button click event
    window.onpopstate = function (event) {
        if (event.state) {
            loadContent(event.state.path);
        }
    };
    // Initial check for active link on page load
    var initialTitle = $('head title').text();
    var initialPage = $('a[data-page="' + initialTitle.toLowerCase() + '"]');
    initialPage.addClass('active'); // Add 'active' class to current page link
});

function loadContent(url) {
    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            // Update content area with the HTML content received from the AJAX response
            $('.content-wrapper').html(response); // no error
            // Update document title based on the title received from the AJAX response
            var newTitle = $(response).filter('title').text();
            if (newTitle) {
                $('head title').text(newTitle);
            }
            // Update the active state of navigation links based on the new title
            var currentPage = $('a[data-page="' + newTitle.toLowerCase() + '"]');
            $('.link').removeClass('active');
            currentPage.addClass('active');
        },
    });
}
