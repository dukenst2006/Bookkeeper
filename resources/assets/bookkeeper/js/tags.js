;(function (window) {
    'use strict';

    /**
     * Tags constructor
     */
    function Tags(el) {
        this.el = el;

        this._init();
    }

    inheritsFrom(Tags, Searcher);

    // Tags prototype
    Tags.prototype._init = function () {
        this.tagsList = this.el.find('ul.tags-list');
        this.tags = this.el.find('li.tag');
        this.input = this.el.find('input#t_tags');

        this.initSearcher();

        this._initEvents();
    }

    Tags.prototype._extractItems = function () {
        this.itemKeys = this.tags.map(function () {
            return $(this).data('tagid');
        }).get();
    }

    Tags.prototype._initEvents = function () {
        var self = this;

        this.tagsList.on('click', '.tag__option--detach', function () {
            var tag = $(this).closest('li.tag');

            self._detachTag(tag);
        });
    }

    Tags.prototype._searchPressReturn = function (title) {
        return;
    }

    Tags.prototype._search = function (keywords) {
        var self = this;

        if (!self.searching) {
            $.post(this.searchurl, {q: keywords, locale: self.locale}, function (data) {
                self._populateResults(data);
            });
        }
    }

    Tags.prototype._addResult = function (id, item) {
        return $('<li class="related-search__result">' + item + '<input class="related-search__input" type="text" value="' + id + '"></li>');
    }

    Tags.prototype._addItem = function (item) {
        var id = parseInt(item.find('input').val());

        var tag = this._createTag(id, item.text());

        this._finishAddingTag(id, tag)
    }

    Tags.prototype._finishAddingTag = function (id, tag) {
        this.tagsList.append(tag);

        this.itemKeys.push(id);

        this._clearSearch();

        this.search.focus();

        this._regenerateInput();
    }

    Tags.prototype._createTag = function (id, name) {
        var tag = $('<li class="tag" data-tagid="' + id + '"><span class="tag__option tag__option--detach"><i class="tag__icon icon-cancel"></i></span></li>');

        $('<span class="tag__text">' + name + '</span>').prependTo(tag);

        return tag;
    }

    Tags.prototype._detachTag = function (tag) {
        var id = tag.data('tagid');

        var i = this.itemKeys.indexOf(id);
        delete this.itemKeys[i];

        tag.remove();

        this._regenerateInput();
    }

    Tags.prototype._regenerateInput = function () {
        var val = JSON.stringify(this.itemKeys);

        if (val.toLowerCase() === "[null]") {
            val = "[]";
        }

        this.input.val(val);
    }

    Tags.prototype.flush = function () {
        this.tagsList.empty();

        this.itemKeys = [];

        this._clearSearch();

        this._regenerateInput();
    }

    // Register tags to window namespace
    window.Tags = Tags;

})(window);