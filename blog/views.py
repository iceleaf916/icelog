# Create your views here.

from django.shortcuts import render_to_response, get_object_or_404
from blog.models import Post, Category, Link, Settings
from django.template import RequestContext
from django.http import HttpResponseRedirect

class SettingObj(object):
    pass

def get_settings_dict():
    r_dict = SettingObj()
    settings = Settings.objects.all()
    for setting in settings:
        setattr(r_dict, setting.key, setting.value)
    return r_dict

def index(request):
    latest_posts = Post.objects.all().order_by('-created_at')[:10]
    category_list = Category.objects.all()
    link_list = Link.objects.all()
    return render_to_response('index.html',{
                'post_list': latest_posts,
                'category_list': category_list,
                'link_list': link_list,
                'is_single': False,
                'settings': get_settings_dict(),
            }, context_instance=RequestContext(request))

def single(request, post_id):
    post = Post.objects.get(pk=post_id)
    category_list = Category.objects.all()
    link_list = Link.objects.all()
    return render_to_response('single.html',{
                'post': post,
                'category_list': category_list,
                'link_list': link_list,
                'is_single': True,
                'settings': get_settings_dict(),
            }, context_instance=RequestContext(request))
