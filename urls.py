from django.conf.urls.defaults import patterns, include, url

# Uncomment the next two lines to enable the admin:
from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    url(r'^$', 'icelog.views.home', name='home'),
    url(r'^blog/', include('icelog.blog.urls')),
)

urlpatterns += patterns('',
    # Examples:
    # url(r'^$', 'icelog.views.home', name='home'),
    # url(r'^icelog/', include('icelog.foo.urls')),

    # Uncomment the admin/doc line below to enable admin documentation:
    url(r'^admin/doc/', include('django.contrib.admindocs.urls')),

    # Uncomment the next line to enable the admin:
    url(r'^admin/', include(admin.site.urls)),
)