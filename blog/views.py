# Create your views here.

from django.shortcuts import render_to_response
from blog.models import Post, Category, Link

def index(request):
    latest_posts = Post.objects.all().order_by('-created_at')[:10]
    category_list = Category.objects.all()
    link_list = Link.objects.all()
    return render_to_response('index.html',{
                'post_list': latest_posts,
                'category_list': category_list,
                'link_list': link_list,
                'is_single': False,
            })

def detail(request, post_id):
    post = Post.objects.get(pk=post_id)
    return render_to_response('single.html',{
                'post': post,
                'is_single': True,
            })

