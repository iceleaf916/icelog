# Create your views here.

from django.shortcuts import render_to_response, get_object_or_404
from blog.models import Post, Category, Link 
from django.template import RequestContext
from django.http import HttpResponseRedirect

def index(request):
    latest_posts = Post.objects.all().order_by('-created_at')[:10]
    category_list = Category.objects.all()
    link_list = Link.objects.all()
    return render_to_response('index.html',{
                'post_list': latest_posts,
                'category_list': category_list,
                'link_list': link_list,
                'is_single': False,
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
            }, context_instance=RequestContext(request))
