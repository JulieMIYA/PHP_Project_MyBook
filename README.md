# PHP_Project_MyBook
## This is a social network website MyBook(like Facebook).
###The function it provides:
  - login, register
  - search friend by name
  - follow/ unfollow friends
  - update one's profile /upload the prfile picture.
  - post one's status
  - view one's status by the order of time 
  - view all the followed friends' status
  - logout

###The technique used:
  - `HTML`
  - `PHP`
  - `CSS`
  - `JAVASCRIPT`
  - `Bootstrap`
  - `Jquery`
  - `MySQL`

## To run it, you need to:
 * Download & install php, apache, MySQL or install the development server WAMP (or LAMP, MAMP), which is more convenient！！
 * create a database "mybook" including 3 tables(The highlight field is the primary key )
    * friends(`follower,followed`)  -- store the relationship of friends
    * members(`user`,pass,profile)  -- store the users' basic info 
    * post(`id`,username,post_text,post_time)--store the posts <br>
    * type of data: 
       * 'follower','followed','user','pass':varchar(30)<br>
       * 'post_time':timestamp<br>
       * 'profile','post_text':text<br>
 * remember to change the servername($servername),username($_db_user),password($_db_pass)in the `db.php` in folder `classes`
 
##The structure of this project/repository
  * `classes`                                
    * db.php   --     a class connecting with the DB
    * managerUser.php  -- a class get accessed to `friends` and `members` tables via `db.php`(CRUD)
    * managePost.php --  a class get accessed to `post` tables via `db.php`(CRUD)
  * `libs` -- process the `post` from the user(like username, password),and return corresponding results and alerts
    * user_info.php
    * profile_info.php
    * profile_info.php
    * session.php
    * logout.php
  * `statics`-- some constant part of html file & two constant functions
    * footer.php
    * header.php
    * showphoto.php
    * friendlist.php
  * `index.php` -- login/register page
  * `homepage.php`-- homepage of "MyBook", intergrate all the function here
  * `profile.php`-- page to update personal profile
  * `search.php`-- search friends
   
    
