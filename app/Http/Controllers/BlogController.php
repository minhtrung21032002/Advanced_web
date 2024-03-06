<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function display_blog(Request $request){
    
      $blogs = DB::select("SELECT * FROM blog");
      return view('summary/blog', compact('blogs'));
    }

    public function display_blog_create(Request $request){
        return view('summary/blog_create');
    }

    public function display_blog_page(Request $request, $blog)
    {
      session_start(); // Ensure the session is started
      $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
      
      $user_info = DB::select("SELECT * FROM user WHERE email = ?", [$email]);
      
      // Check if the user was found
      if (!empty($user_info)) {
          $post_user = $user_info[0];
      
          // Check if the user has a photo_id
          if ($post_user->photo_id) {
              // Query to get photo information based on photo_id
              $photo_information = DB::select("SELECT * FROM photo WHERE photo_id = ?", [$post_user->photo_id]);
      
              $post_information = [
                  'user_information' => $post_user,
                  'photo_information' => $photo_information,
              ];
          } else {
              // If the user does not have a photo_id, set photo_information to null or any default value
              $post_information = [
                  'user_information' => $post_user,
                  'photo_information' => null,
              ];
          }
      } else {
          // If the user is not found, set post_information to null or handle accordingly
          $post_information = null;
      }


      $paragraph = DB::select("SELECT * FROM paragraph where blog_id = ? ",[$blog]);
      $blog_content = DB::select('SELECT * FROM blog WHERE blog_id = ? LIMIT 1', [$blog]);
      $comments = DB::select("SELECT * FROM comment WHERE blog_id = ?", [$blog]);
      $comments = DB::select("SELECT * FROM comment WHERE blog_id = ?", [$blog]);
      $post_user = 
      $comments_information = [];

      foreach ($comments as $comment) {
          $user_id = $comment->user_id;
      
          // Query to get user information and photo_id
          $user_information = DB::select("SELECT * FROM user WHERE user_id = ?", [$user_id]);
      
          foreach ($user_information as $user) {
              $photo_id = $user->photo_id;
      
              // Query to get photo information based on photo_id
              $photo_information = DB::select("SELECT * FROM photo WHERE photo_id = ?", [$photo_id]);
      
              // Append user and photo information to comments_information
              $comments_information[] = [
                  'comment' => $comment,
                  'user_information' => $user_information,
                  'photo_information' => $photo_information,
              ];
          }
      }
      
      // Now, $comments_information contains both comment and user information for each comment
      $blog = $blog_content[0];
      return view('summary/blog_page', compact('paragraph','blog','comments_information','post_information'));
    }

    public function blog_create(Request $request){
      
      $errorMessage;
      //validation
      $blog_date = now()->format('Y-m-d');

      $request->validate([
        'blog_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);
      

      // user_id
      session_start(); // Ensure the session is started
      $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
      $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
      $userId = $userId[0]->user_id; // Assuming it returns a single result
      //Input Request
      $blog_title = $request->input('blog_title');
      $blog_image = $request->file('blog_img');

      $paragraph_content1 = $request->input('paragraph_content1');
      $paragraph_title1 = $request->input('paragraph_title1');
      $paragraph_image1 = $request->file('paragraph_image1');

      $paragraph_content2 = $request->input('paragraph_content2');
      $paragraph_title2 = $request->input('paragraph_title2');
      $paragraph_image2 = $request->file('paragraph_image2');

      $paragraph_content3 = $request->input('paragraph_content3');
      $paragraph_title3 = $request->input('paragraph_title3');
      $paragraph_image3 = $request->file('paragraph_image3');
  
      // Process Input
      $sentencesArray1 = $this->processParagraphs($paragraph_content1);
   
      $sentencesArray2 = $this->processParagraphs($paragraph_content2);
      $sentencesArray3 = $this->processParagraphs($paragraph_content3);

      $path1 = $blog_image->store("public/assets/imgs/blog_userId={$userId}");
      $path2 = $paragraph_image1->store("public/assets/imgs/blog_userId={$userId}");
 
      $path3 = $paragraph_image2->store("public/assets/imgs/blog_userId={$userId}");
      $path4 = $paragraph_image3->store("public/assets/imgs/blog_userId={$userId}");
    
      $imageUrl1 = Storage::url($path1);
      $imageUrl2 = Storage::url($path2);
 
      $imageUrl3 = Storage::url($path3);
      $imageUrl4 = Storage::url($path4);
      
      //insert into database

      $existingBlogTile = DB::select('SELECT * FROM blog WHERE blog_title = ? LIMIT 1', [$blog_title]);
      if (empty($existingUser)) {
                  // Using the DB facade to execute a raw SQL insert statement
                  DB::insert('INSERT INTO blog (blog_title, blog_img,user_id,blog_date ) VALUES (?, ?, ?, ?)', [$blog_title, $imageUrl1,$userId, $blog_date ]);
      }else{
          return view('summary/blog', compact('errorMessage'));
      }

      $blogId = DB::select("SELECT blog_id FROM blog WHERE blog_title = ?", [$blog_title]);
      $blogId = $blogId[0]->blog_id; // Assuming it returns a single result

      DB::insert('INSERT INTO paragraph (paragraph_title, paragraph_content, paragraph_img, paragraph_number, blog_id ) VALUES (?, ?, ?, ?, ?)', [$paragraph_title1 , $sentencesArray1, $imageUrl2, 1, $blogId]);
     
      DB::insert('INSERT INTO paragraph (paragraph_title, paragraph_content, paragraph_img, paragraph_number, blog_id) VALUES (?, ?, ?, ?, ?)', [$paragraph_title2, $sentencesArray2, $imageUrl3, 2, $blogId]);

      // Inserting third paragraph
      DB::insert('INSERT INTO paragraph (paragraph_title, paragraph_content, paragraph_img, paragraph_number, blog_id) VALUES (?, ?, ?, ?, ?)', [$paragraph_title3, $sentencesArray3, $imageUrl4, 3, $blogId]);

      return Redirect::route('display_blog');
    }
      
  

  private function processParagraphs($paragraph_content)
  {
      $paragraphs = explode("\r\n", $paragraph_content);

      $sentencesArray = [];
      foreach ($paragraphs as $paragraph) {
          // Split the paragraph into sentences
          $trimmedSentence = trim($paragraph);
          if ($trimmedSentence !== "") {
              $sentencesArray[] = $trimmedSentence;
          }
      }
      $insert_data = json_encode($sentencesArray);
      return $insert_data;
  }

  public function upload_comment(Request $request, $blog)
    {
        $comment_value = $request->input('editordata');
        $comment_date = date("Y-m-d");
        session_start(); // Ensure the session is started
        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $userId = DB::select("SELECT user_id FROM user WHERE email = ?", [$email]);
        $userId = $userId[0]->user_id; // Assuming it returns a single result
        DB::insert('INSERT INTO comment ( blog_id , user_id, comment_content, comment_date) VALUES ( ?, ?, ?, ?)', [$blog, $userId, $comment_value,$comment_date]);
        return Redirect::route('display_blog');
        // Now you can use $descValue as needed, for example, store it in the database
    }

    public function text_editor($blog)
    {
        // Assuming you want to pass the blog_id to the view
        return view('summary/text-editor', compact('blog'));
    }
}


