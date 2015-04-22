(function( ) {
'use strict';

    var searchInput = document.getElementById('searchInput');
    var searchSubmit = document.getElementById('searchSubmit');

    searchSubmit.addEventListener('click', function(e) {
        if(searchInput.value === '') {
            e.preventDefault();
        }
        else {
            return true;
        }
    });

}());