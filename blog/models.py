# coding: utf-8
# Author: iceleaf<kaisheng.ye@gmail.com>

from django.db import models
from django.contrib.auth.models import User
from tagging.fields import TagField

class Category(models.Model):
    name = models.CharField(max_length=50, verbose_name=u'类名')
    slug = models.CharField(max_length=50, verbose_name=u'slug', help_text=u'本文的短标签，将出现在文章 URL 中。可包含字母、数字、减号、下划线，如：does-python-optimize-function-calls-from-loops')
    description = models.CharField(max_length=200, verbose_name=u'简单描述', blank=True)
    seq = models.IntegerField(default=0, db_index=True, verbose_name=u'排序')

    def __unicode__(self):
        return self.name

    def get_absolute_url(self):
        return u'/category/%s/' % (self.slug or self.name.replace('/', '-'),)

    class Meta:
        ordering = ['seq']
        verbose_name_plural = verbose_name = u'分类'
'''
class Tag(models.Model):
    name = models.CharField(max_length=100, unique=True, verbose_name=u'名称')

    def __unicode__(self):
        return self.name

    def get_absolute_url(self):
        return u'/t/%s/' % self.name

    class Meta:
        verbose_name_plural = verbose_name = u'标签'
'''

class Post(models.Model):
    title = models.CharField(max_length=200, verbose_name=u'标题')
    slug = models.CharField(max_length=100, verbose_name=u'slug', help_text=u'本文的短标签，将出现在文章 URL 中。可包含字母、数字、减号、下划线，如：does-python-optimize-function-calls-from-loops')
    author = models.ForeignKey(User)
    content = models.TextField()
    created_at = models.DateTimeField(auto_now_add=True, verbose_name=u'发布时间')
    category = models.ForeignKey(Category)
    #tags = models.ManyToManyField(Tag, blank=True, verbose_name=u'标签')
    tags = TagField()
    
    def __unicode__(self):
        return self.title

    def get_absolute_url(self):
        return u'post/%s/' % (self.id, 
#                self.created_at.strftime('%m'), 
#                self.slug or self.title.replace('/', '-'),
        )
    
    def __get_excerpt(self):
        return self.content.split('<!--more-->')[0]

    excerpt = property(__get_excerpt)

    def __get_remain(self):
        return self.content.split('<!--more-->')[1]

    remain = property(__get_remain)

    def __get_pagebreak(self):
        try:
            self.content.index('<!--more-->')
        except ValueError:
            return False
        else:
            return True
    pagebreak = property(__get_pagebreak)
    
    class Meta:
        get_latest_by = 'created_at'
        ordering = ['-id']
        verbose_name_plural = verbose_name = u'文章'

class Link(models.Model):
    name = models.CharField(max_length=100, verbose_name=u'名称')
    description = models.CharField(max_length=200, verbose_name=u'描述', blank=True)
    url = models.URLField(max_length=200, verbose_name=u'链接')
    seq = models.IntegerField(default=0, db_index=True, verbose_name=u'排序')

    def __unicode__(self):
        return self.name

    class Meta:
        ordering = ['seq']
        verbose_name_plural = verbose_name = u'链接'

"""
class Comment(models.Model):
    name = models.CharField(max_length=100, verbose_name=u'昵称')
    email = models.EmailField(verbose_name=u'邮箱')
    website = models.URLField(max_length=200, verbose_name=u'个人网站', blank=True)
    content = models.TextField(verbose_name=u'留言')
    created_at = models.DateTimeField(auto_now_add=True, verbose_name=u'留言时间')
    post = models.ForeignKey(Post)

    def __unicode__(self):
        return u"%s<%s>" % (self.name, self.email)

    class Mata:
        get_latest_by = 'created_at'
        ordering = ['-id']
        verbose_name_plural = verbose_name = u'评论'
"""
