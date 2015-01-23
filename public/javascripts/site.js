$(function () {
    $('#phone-navigation #phone-menu').change(function () {
        var url = $(this).val();
        if (url) {
            window.location = url;
        }
    });

    $('select').select2();

    if ($('.tags').length) {
        $.getJSON('/api/tags', function (tags) {
            var selectTags = [];
            $.each(tags, function (id, tag) {
                selectTags.push(tag)
            });
            $('.tags').select2({
                multiple: true,
                width: '100%',
                tags: selectTags
            });
        })
    }

});

var fancyFilter = function (filterListSelector, gallerySelector) {
    //Filter Button Code
    $(filterListSelector + ' a').click(function () {
        $(filterListSelector + ' li').removeClass('active');
        var $this = $(this);
        var filterType = $this.data('filter');
        if (!filterType) return true;

        $this.closest('li').addClass('active');
        $(gallerySelector).isotope({
            filter: filterType,
        });

        return false;
    });
};

