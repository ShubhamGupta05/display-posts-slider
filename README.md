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
8. Post__not_in (Pass post id's to exclude that post)<br>
    (Optional)(Array of Id's)<br>
    Example:- [custom_shortcode post__not_in = 'array(1,2,3)']
9. Date_query_after (Pass the date to show the posts created after this date)<br>
    (Optional)(Date format in mm-dd-yy)<br>
    Example:- [custom_shortcode date_query_after = 'September 1st, 2021']
10. Date_query_before (Pass the date to show the posts created before this date)<br>
    (Required with the date_query_after parameter)(Date format in mm-dd-yy)<br>
    Example:- [custom_shortcode date_query_after = 'September 1st, 2021' date_query_before = 'September 30th, 2021'] 
11. Date_query_inclusive (Pass the value in true or false to tell whether the exact value should be matched or not)<br>
    (Required with the date_query_after parameter)(Boolean Value)<br>
    Example:- [custom_shortcode date_query_after = 'September 1st, 2021' date_query_before = 'September 30th, 2021' date_query_inclusive = 'true']
12. Pagename (Pass the name of the page you wish to display)<br>
    (Optional)(String)<br>
    Example:- [custom_shortcode pagename = 'checkshortcode']
13. Search (s) (Pass the value you want to search in the post)<br>
    (optional)(string)<br>
    Example:- [custom_shortcode s = 'this']
14. Category_name (Pass the category slug name to show the posts related to this category)<br>
    (Optional)(String)<br>
    Example:- [custom_shortcode category_name = 'mypost']
15. category__not_in (Pass category id's to exclude the posts from these categories)<br>
    (Optional)(Array of category Id's)<br>
    Example:- [custom_shortcode category__not_in = 'array(1,2,3)']
16. Tag (Pass the tag slug name to show all the posts related to this tag)<br>
    (Optional)(String)<br>
    Example:- [custom_shortcode tag = 'action']
17. Tag__not_in (Pass tag id's to exclude the posts having that tags)<br>
    (Optional)(Array of tag Id's)<br>
    Example:- [custom_shortcode tag__not_in = 'array(1,2,3)']
18. comment_count (Pass the value to see the posts having this much number of commets )<br>
    (Optional)(Number)<br>
    Example:- [custom_shortcode comment_count = '2']
19. tax_query_taxonomy (Pass the name of the custom taxonomy from which you want to display the posts)<br>
    (Optional)(String)<br>
    Example:- [custom_shortcode tax_query_taxonomy = 'movie']
20. tax_query_field (Pass the slug value of the taxonomy added in the tax_query_taxonomy parameter)<br>
    (Required with tax_query_taxonomy)(string)<br>
    Example:- [custom_shortcode tax_query_taxonomy = 'movie' tax_query_field = 'movie']
21. tax_query_terms (Pass the value from the taxonomy terms)<br>
    (Required with the tax_query_taxonomy parameter)(string)<br>
    Example:- [custom_shortcode tax_query_taxonomy = 'movie' tax_query_field = 'movie' tax_query_field = 'action']
22. meta_key (Pass string value)<br>
     (Optional)(String)<br>
    Example:- [custom_shortcode meta_key = 'price']
23. meta_value_num ( Works in conjuntion with orderby)<br>
     (Required with meta_key parameter)(String)<br>
    Example:- [custom_shortcode meta_key = 'price' meta_value_num = 100]
24. meta_compare ( Pass compare key such as “>” “<” “!=” etc while comparing two or more meta value)<br>
     (Required with meta_key & meta_value_num parameter)(String)<br>
    Example:- [custom_shortcode meta_key = 'price' meta_value_num = 100 meta_compare = '>']
25. post_mime_type ( Pass the Type of Attachment which you wish to show)<br>
     (Optional)(String)<br>
    Example:- [custom_shortcode post_mime_type = 'array('jpg','png','gif')']






# Warning 

 If no parameters are passed to a shortcode, it will fetch posts according to the default parameters given.