1. Create a new file named upcoming_events.php in your WordPress plug-in directory.

2. Paste the contents of my upcoming_events.php file into the new file and save.

3. Log in to WordPress as your administrator user and enable the plug-in. Once this plug-in has been enabled, it becomes available as `Upcoming Events` in your WordPress `Appearance > Widgets` menu.

4. Create a new category named `Events`. All events must be placed in this category for the plug-in to work correctly.

5. Create a new post, choosing `Events` as the category. Create a Custom Field within the post named `Date` and assign a value in the format Y/m/d H:i (2010/12/01 16:00)  See more information on the PHP Date Function here: http://php.net/manual/en/function.date.php


There are some customizations that can be made to the plug-in file to help configure this plug-in for your site.
 
If your site needs events for multiple locations, you can change the `&tag=` options under the query_posts. (&tag=location1,location2,location3,location4).  You would then tag your post accordingly.
On my site, I needed the event title trimmed in order to maintain a clean appearance. I used the following code to trim it.  If you need the entire title displaying, just comment it out of the code.
       
//shorten event title if it is too long...
echo '<li>'; $shorttitle = substr(the_title('','',FALSE),0,12);
echo $shorttitle; if (strlen($shorttitle) >11){ echo '&hellip;'; }
//end shorten event title if too long...

I’m sure you will have to change some of my CSS styles to match your template (...just a heads up)
