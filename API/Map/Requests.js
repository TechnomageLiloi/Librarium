API.Map = {
    collection: function ()
    {
        API.request('Holocron.Map.Collection', {

        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    },

    show: function (url)
    {
        API.request('Holocron.Map.Show', {
            'url': url
        }, function (data) {
            $('#page').html(data.render);
        }, function () {

        });
    }
}