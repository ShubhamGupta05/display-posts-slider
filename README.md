# Custom-Shortcode

This plugin allows you to fetch posts.

# Description

Allows you to fetch posts from the database on the basis of the parameters you passed in the shortcode.
  
# Installation

1. Download the plugin zip file from the given link(https://github.com/ShubhamGupta05/custom-shortcode)

2. Click on Code button and select Download Zip.

3. Once the file gets downlaoded. Go to your site dashboard.

4. Click on the Plugin tab in the left panel.

5. Click on Add New plugin.

6. Click on the Upload Plugin button.

7. Select the file you downloaded and click on Install now.

8. Once the plugin is install. It will ask for the activation.

9. Click on Activating plugin button.

10. Once the plugin is activated. You are ready to use it.

# How to use this plugin:

1. Open a page or a post on which you want to display the post.

2. Add the shortcode block to the page or post.

3. In the short code block add this [custom_shortcode posts_per_page=4 post_type='post'] in the shortcode name field.

4. Publish the page or post.

# Parameter

List of the parameters that can be passed while calling the shortcode:

1. Posts_per_page ( Pass the number of posts you want to display. Maximum limit is set to 100)<br>
    (Optional)(Number)<br>
    Example:- [custom_shortcode posts_per_page = 5]
2. Post_type ( Pass the post type for which you need the post )<br>
    (Required*)(String)<br>
    Example:- [custom_shortcode post_type = 'post']
3. Name ( Pass the name of the post you want to display)<br>
    (Optional)(String)<br>
    Example:- [custom_shortcode name = 'this is my first post']
4. Author_name (Pass the name of the author whose post you want to display)<br>
    (Optional)(String)<br>
     Example:- [custom_shortcode author_name = 'Shubham']
5. post_status (Pass the status of the post which you want to display example: published, draft,      revision, attachement)<br>
    (Optional)(String)<br>
    Example:- [custom_shortcode post_status = 'published']
6. order (Pass Asc or Desc to display your posts in the order you want)<br>
    (Required)(String)<br>
    Example:- [custom_shortcode order = 'DESC']
7. Orderby ( Pass the keyvalue on the basis of which you want to sort you posts)<br>
     (Optional)(String)<br>
    Example:- [custom_shortcode orderby = 'date']

# Warning 

 If no parameters are passed to a shortcode, it will fetch posts according to the default parameters given.