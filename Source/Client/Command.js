var Command = {
    copy: function (text)
    {
        navigator.clipboard.writeText(text);
    },

    execute: function (url)
    {
        $('#page').attr('src', url);
    }
};