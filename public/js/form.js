$(document).ready(function ()
{
    $.fn.classes = function (callback)
    {
        var classes = [];
        $.each(this, function (i, v) {
            var splitClassName = v.className.split(/\s+/);
            for (var j = 0; j < splitClassName.length; j++) {
                var className = splitClassName[j];
                if (-1 === classes.indexOf(className)) {
                    classes.push(className);
                }
            }
        });
        if ('function' === typeof callback) {
            for (var i in classes) {
                callback(classes[i]);
            }
        }
        return classes;
    };

    $('body').on("change keyup input click", 'input.form-input', function()
    {
        const pattern =
        {
            'cyrillic' : 'a-z',
            'latin' : 'а-я',
            'number' : '0-9',
            'chars' : '\.\-\@\_'
        };

        let input = $(this).classes();

        let inputClasses = "";

        for(var i = 0; i < input.length; i++)
        {
            $.each(pattern, function (key, value)
            {
                if (key === input[i])
                {
                    inputClasses += value;
                }
            });
        }

        const regex = new RegExp(`[^${inputClasses}]`, 'ig');

        if (this.value.match(regex))
        {
            this.value = this.value.replace(regex, '');
        } else
        {

        }
    });

    $('body').on('submit', 'form', function(e)
    {
        let json;
        e.preventDefault();

        $.ajax
        ({
            type: $(this).attr('method'),
            url: $(this).attr('action'),
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function (data)
            {
                alert(data);
                // $('#login').html(data);
            }


        });

    });
});