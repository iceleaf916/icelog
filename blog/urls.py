# coding: utf-8

from django.conf.urls.defaults import patterns, include, url
import blog.views

urlpatterns = patterns('blog.views',
        url(r'^$','index'),
        url(r'^(?P<year>\d{4})/(?P<month>\d{2})/(?<slug>.+)/$', 'detail'),
        url(r'^category/(?P<name>.+)/$', 'category'),
)
