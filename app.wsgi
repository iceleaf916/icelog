#!/usr/bin/python2.6
# coding: utf-8

import sys, os
from django.core.handlers import wsgi

abspath = os.path.abspath(__file__)
dirname = os.path.dirname(abspath)
updir = os.path.dirname(dirname)

if updir not in sys.path:
    sys.path.insert(0, updir)

os.environ['DJANGO_SETTINGS_MODULE'] = 'icelog.settings'

application = wsgi.WSGIHandler()
