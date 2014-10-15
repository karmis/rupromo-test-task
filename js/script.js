$(function () {
    $('.fetch').click(function () {
        var type = $(this).attr('id');
        $.ajax({
            url: 'php/TestTask.php',
            data: {
                type: type
            },
            dataType: 'html',
            type: 'POST'
        }).done(function (data) {
            window.TestTask.distr(type, data)
        });

    });
}(jQuery));

window.TestTask = {
    distr: function (type, data) {
        if (type == 'phpxlst' || type == 'php') {
            this.showHtml(type, data);
        } else if (type == 'js') {
            this.JSParse.parseXML(data).buildHtml();
            this.showHtml(type, this.JSParse.tpl);
            return false;
        }
    },
    showHtml: function (type, html) {
        $('#menu-wrapper').html(html).show();
        $('#method').text(type);
        $('#method-wrapper').show();
    },
    JSParse: {
        rows: {},
        tpl: {},
        parseXML: function (xml) {
            var doc = $.parseXML(xml);
            var $dom = $(doc);
            this.rows = $dom.find("item");

            return this;
        },
        buildHtml: function () {
            this.tpl = $("<ul id='menu'>");
            var self = this;
            $.each(this.rows, function (key, val) {
                var id = $(val).attr('id');
                var link = $(val).attr('link');
                var name = $(val).attr('name');
                var li = $('<li>');
                li.attr('id', id);
                li.attr('href', link);
                li.text(name);
                self.tpl.append(li);
            });

            return this;
        }
    }

}
//window.XMLParser = {
//    config: {
//        url: 'http://www.wextor.ru/udata/content/menu/'
//    },
//    init: function () {
//        this.fetch(this.config.url);
//    },
//    fetch: function (url) {
//        $.get(url,function (data) {
//            debugger;
////            alert("success");
//        }).fail(function () {
//            alert("error");
//        });
//    }
//}

//xmlDoc = $.parseXML( xml ),
//    $xml = $( xmlDoc ),
//    $title = $xml.find( "title" );