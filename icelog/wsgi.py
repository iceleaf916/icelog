# coding: utf-8

import sys, os

abspath = os.path.abspath(__file__)
dirname = os.path.dirname(abspath)
updir = os.path.dirname(dirname)

if updir not in sys.path:
    sys.path.insert(0, updir)
if dirname not in sys.path:
    sys.path.insert(0, dirname)

os.environ.setdefault("DJANGO_SETTINGS_MODULE", "icelog.settings")

from django.core.wsgi import get_wsgi_application
application = get_wsgi_application()
