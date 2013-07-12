#!/home/iceleaf/envicelog/bin/python
# coding: utf-8

import sys, os

abspath = os.path.abspath(__file__)
dirname = os.path.dirname(abspath)
updir = os.path.dirname(dirname)

if updir not in sys.path:
    sys.path.insert(0, updir)
if dirname not in sys.path:
    sys.path.insert(0, dirname)

sys.stdout = sys.stderr
# Add the virtual Python environment site-packages directory to the path
import site
site.addsitedir('/home/iceleaf/icelog_env/lib/python2.7/site-packages/')


# Avoid ``[Errno 13] Permission denied: '/var/www/.python-eggs'`` messages
import os
os.environ['PYTHON_EGG_CACHE'] = '/var/www/blog/egg-cache'

os.environ['DJANGO_SETTINGS_MODULE'] = 'icelog.settings'

import django.core.handlers.wsgi
application = django.core.handlers.wsgi.WSGIHandler()
