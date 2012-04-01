# coding: utf-8
# Author: iceleaf<kaisheng.ye@gmail.com>

from blog.models import Category, Post, Link, Comment, Tag
from django.contrib import admin

class LinkAdmin(admin.ModelAdmin):
    list_display = ['name', 'url']

class CategoryAdmin(admin.ModelAdmin):
    list_display = ['name', 'description']

class PostAdmin(admin.ModelAdmin):
    list_display = ['title', 'author', 'category','created_at']
    search_fields = ['title']
    list_filter = ['category', 'author', 'created_at']
    date_hierarchy = 'created_at'

class CommentAdmin(admin.ModelAdmin):
    list_display = ['name', 'email', 'website', 'created_at']

class TagAdmin(admin.ModelAdmin):
    list_display = ['name',]

admin.site.register(Category, CategoryAdmin)
admin.site.register(Post, PostAdmin)
admin.site.register(Link, LinkAdmin)
admin.site.register(Comment, CommentAdmin)
admin.site.register(Tag, TagAdmin)
