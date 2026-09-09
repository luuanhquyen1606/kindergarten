<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Spatie\Image\Image;
use Illuminate\Support\Facades\File;
class HomeController extends BaseController
{
    public function index()
    {
        $home = DB::table('pages')
        ->where('id', $this->app['school']->home_page_id)
        ->first();
        return $this->page($home->id); 
    } 

    public function preview(Request $request){
        $verify=$request->get('verify');
        $theme_name=$request->get('theme');
        $time=$request->get(key: 'time');
        $check = md5('kidoo'.$time.$theme_name);
        if($verify == $check)
            {
                $theme_preview = array("theme"=>$theme_name,'time'=>time(),'verify'=>$verify);
                session(['theme_preview' => $theme_preview]);
                return redirect(to: '');
            }

        die("Your link is invalid"); 
    }
    public function stopPreview(Request $request){
        session()->forget('theme_preview');

        return redirect(to: '');
    }

    public function page($id)
    {
       
        $page_blocks=[];
        $blocks = DB::table('page_blocks')
        ->join('pages','pages.id','page_blocks.page_id')
        ->where('pages.id', $id)
        ->where('show', 1)
        ->where('pages.school_id', $this->app['school']->id)
        ->whereNull('page_blocks.deleted_at')
        ->orderBy('sort','asc')
        ->select('page_blocks.*')
        ->get();
        foreach ($blocks as $block)
        {
            $page_blocks[]=$this->block($block->id);
        }

       
        // Return a view located at resources/views/home.blade.php
        return view('theme::page', [
            'blocks' => $page_blocks
        ]);
    }
    public function block($block_id,$field='data')
    {
        $block = DB::table('page_blocks')
        ->join('blocks', 'page_blocks.block_id', '=', 'blocks.id')
        ->select('page_blocks.*', 'blocks.code as code','blocks.name as blocks_name','blocks.data as blocks_data')
        ->where('page_blocks.id', $block_id)
        ->first();

        if($field=='data')
        {
        $data['data']=json_decode($block->data,true);
        }
        if($field=='data_preview')
        {
        $data['data']=json_decode($block->data_preview,true);
        }  

        if(is_array($data['data'])==false){
            $data['data']=[];
             return view('theme::blocks.empty', $data);
        }
 
        if($block->code=='programs')
        {
            $programs = DB::table('programs')
        ->leftJoin('files','files.id','programs.photo_id')
        ->leftJoin('thumbnails','thumbnails.file_id','files.id')
        ->select('programs.*', 'files.id as file_id', 'thumbnails.path as thumbnail_path')
        ->where('programs.school_id', $this->app['school']->id)
        ->whereNull('programs.deleted_at')
        ->orderBy('programs.created_at', 'desc')
        ->get();        
            $data['programs']=$programs;  
           
        }
        if($block->code=='teachers')
        {
            $teachers = DB::table('users')
            ->where('school_id', $this->app['school']->id)
            ->whereIn('id', $data['data']['teachers'])
            ->get();         
            $data['teachers']=$teachers;
            
        }

        if($block->code=='testimonials')
        {
            $testimonials = DB::table('testimonials')
            ->where('school_id', $this->app['school']->id)
            ->whereIn('id', $data['data']['testimonials'])
            ->get();
            $data['testimonials']=$testimonials; 
            
        }
         if($block->code=='article_teaser')
        {
            $post = DB::table('posts')
            ->leftJoin('categories','categories.id','posts.category_id')
            ->where('posts.school_id', $this->app['school']->id)
            ->where('posts.id', $data['data']['id'])
          //  ->where('posts.is_published',1)
            ->select('posts.*','categories.name as category_name')
            ->first();

           
          
            $data['post']=$post; 
            
        }
        if($block->code=='articles_teasers')
        {
            $posts = DB::table('posts')
            ->leftJoin('categories','categories.id','posts.category_id')
            ->leftJoin('users','users.id','posts.user_id')
            ->where('posts.school_id', $this->app['school']->id)
            ->where('posts.is_published',1)
            ->whereNull('posts.deleted_at')
            ->select('posts.*','categories.name as category_name','users.name as user_name','users.photo_id as user_photo_id');
    

            if($data['data']['posts_collect']=='manual')
            {
                 $posts->whereIn('posts.id',$data['data']['posts']);
                
            }
            if($data['data']['posts_collect']=='auto')
            {
                if(isset($data['data']['categories']))
                {
                $categories = $data['data']['categories'];
                if(count($categories)>0)
                {
                    //get all tags
                     $posts->whereIn('posts.id',$categories);
                }
                }
                if(isset($data['data']['tags']))
                {
                    $tags = $data['data']['tags'];
                    if(count($tags)>0)
                    {
                        //get all tags
                        $posts->whereIn('posts.id', function ($query) use ($tags ) 
                            {
                                $query->select('post_id')
                                    ->from('posts_tags')->whereIn('tag_id',$tags);
                            });
                    }
                
                }
                $quantity=3;
                if(isset($data['data']['quantity']))
                {
                $quantity = intval($data['data']['quantity']);
                
                }
                if($quantity>0)
                {
                    $posts->limit($quantity);
                }
                
            }

            
            $posts=$posts->get();
           
            foreach ($posts as $index=>$post) 
            {
                $posts[$index]->tags = DB::table('tags')
                    ->whereIn('id', function ($query) use ($post) {
                            $query->select('tag_id')
                                ->from('posts_tags')->where('post_id',$post->id);
                        })->get();
            }
           
            $data['posts']=$posts;  
            
        }

        if($block->code=='metrics')
            {
                /*
                $teachers = DB::table('users')
                ->where('school_id', $this->app['school']->id)
                ->whereIn('id', $data['data']['teachers'])
                ->get();         
                $data['teachers']=$teachers;
                */
                
            }

        if($block->code=='gallery')
        {
           $files=$posts = DB::table('files')
            ->whereIn('id', $data['data']['files'])
            ->get();
            $data['files']=$files;    

          
        }
        if($block->code=='hero_banner')
        {
           
            
        }
        
        return view('theme::blocks.'.$block->code, $data);
    }
    public function block_view($id){
        $block =$this->block($id,'data_preview');
        $data['block']=$block; 
        return view('theme::block_view', $data);
    }

    public function programs(){
        $programs = DB::table('programs')
        ->where('school_id', $this->app['school']->id)
        ->whereNull('deleted_at')
        ->get();
        foreach ($programs as $index=>$program)
            {
                 $files = DB::table('files')
                ->leftJoin('program_files','files.id','program_files.file_id')
                ->where('program_files.program_id',$program->id)
                ->select('*')
                ->get();
                $programs[$index]->files = $files; 
            }

        $data['programs']=$programs; 
   
        return view('theme::programs', $data);
    }

        public function program($slug){
        $program = DB::table('programs')
        ->where('school_id', $this->app['school']->id)
        ->where('slug',$slug)
        ->first(); 
        $files = DB::table('files')
                ->leftJoin('program_files','files.id','program_files.file_id')
                ->where('program_files.program_id',$program->id)
                ->select('files.*')
                ->get();
        $program->files = $files;  

        $classes = DB::table('classes')
                ->leftJoin('programs','programs.id','classes.program_id')
                ->where('classes.program_id',$program->id)
                ->select('classes.*')
                ->get();
        $program->classes = $classes;  
        $teacher = DB::table('users')
                ->where('id',$program->manager_id)
                ->first();
        $program->teacher = $teacher;
        $data['program']=$program; 
   
        return view('theme::program', $data);
    }
    public function get_photo($id,$size=1024){
       
        
        $file = DB::table('files')
        ->where('id', $id)
        ->first();
        $original_path = '/files/'.$file->school_id.'/'.$file->name;

        
        $resize_path = '/files/'.$file->school_id.'/resize/'.$size.'_'.$file->name; 
          

        if(file_exists(public_path($original_path)) ){ 
           
            if(!file_exists(public_path($resize_path)) ){
               
                Image::load(public_path($original_path))
                            ->width($size)
                            ->quality(100)
                            ->save( public_path($resize_path));
            }
            
            $lastModified = filemtime(public_path($resize_path));
            $lastModifiedGMT = gmdate('D, d M Y H:i:s', $lastModified) . ' GMT';

            // Browser sends this when checking its cached file
            $ifModifiedSince = request()->header('If-Modified-Since');

            // If browser cache is still valid → return 304
                      /*     
            if ($ifModifiedSince && strtotime($ifModifiedSince) >= $lastModified) {
                return response('', 304)
                    ->header('Cache-Control', 'public, max-age=31536000, immutable')
                    ->header('Last-Modified', $lastModifiedGMT);
            }*/ 
 

            return response()->file(
                public_path($resize_path),
                [
                    'Content-Type' => $file->mime_type,
                    'Cache-Control' => 'public, max-age=31536000, immutable',
                   // 'Last-Modified' => gmdate('D, d M Y H:i:s', filemtime(public_path($resize_path))) . ' GMT',
                  //  'Expires'       => gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT',
                ]
                );
        }
        else{
            $resize_path = '/themes/star/images/footer/6.png';
            return response()->file(
                public_path($resize_path),
                [
                    'Content-Type' => $file->mime_type,
                    'Cache-Control' => 'public, max-age=31536000',
                ]
                );
        }
       
    }
    
    public function teacher($slug){
       
        $teachers = DB::table('users')
            ->where('school_id', $this->app['school']->id)
            ->whereNull('deleted_at')
            ->get();
        $data['teachers']=$teachers; 
        $teacher = DB::table('users')
            ->where('school_id', $this->app['school']->id)
            ->where('slug', $slug)
            ->whereNull('deleted_at')
            ->first();
        $data['teacher']=$teacher; 

        return view('theme::teacher', $data);
    }
    public function teachers(){
       

        $teachers = DB::table('users')
            ->where('school_id', $this->app['school']->id)
            ->whereNull('deleted_at')
            ->get();
        $data['teachers']=$teachers; 

        return view('theme::teachers', $data);
    }

    public function sample_json($block_name){
        if($block_name == 'banner')
        {
        $data['sliders'][]=["image"=>"https://mamnonbanmai.blog/themes/star/images/slider/1.jpg","title"=>"Kindergarten Education for your Child","sub_title"=>"Cupidatat non proident sunt culpa qui officia deserunt mollit","link_title"=>"Tham gia","link"=>"https://mamnonbanmai.blog/"];
        $data['sliders'][]=["image"=>"https://mamnonbanmai.blog/themes/star/images/slider/2.jpg","title"=>"Kindergarten Education for your Child","sub_title"=>"Cupidatat non proident sunt culpa qui officia deserunt mollit","link_title"=>"Đăng ký","link"=>"https://mamnonbanmai.blog/"];
        $data['sliders'][]=["image"=>"https://mamnonbanmai.blog/themes/star/images/slider/3.jpg","title"=>"Kindergarten Education for your Child","sub_title"=>"Cupidatat non proident sunt culpa qui officia deserunt mollit","link_title"=>"Chi tiết","link"=>"https://mamnonbanmai.blog/"];
        }
        if($block_name == 'intro_card')
        {
        $data['title']="Giới thiệu nhà trường";
        $data['content']="Mầm non ban mai được thành lập năm 2020 tại ...";
        $data['images'][]="https://mamnonbanmai.blog/themes/star/images/gallery/g1.jpg";
        $data['images'][]="https://mamnonbanmai.blog/themes/star/images/gallery/g2.jpg";
        $data['images'][]="https://mamnonbanmai.blog/themes/star/images/gallery/g3.jpg";
        $data['images'][]="https://mamnonbanmai.blog/themes/star/images/gallery/g4.jpg";
        $data['link']="https://mamnonbanmai.blog/";
        $data['link_title']="https://mamnonbanmai.blog/";
        }  
        if($block_name == 'feature_grid')
        {
        $data['title']="Thế mạnh nhà trường";
        $data['sub_title']="Để có chất lượng đào tạo tốt nhất";
        $data['image']="https://mamnonbanmai.blog/themes/star/images/service/1.png";
        $data['features'][]=["title"=>"Chất lượng giáo viên","sub_title"=>"Tốt nghiệp mầm non chính quy, yêu nghề","icon"=>"fa-graduation-cap"];
        $data['features'][]=["title"=>"Cơ sở vật chất","sub_title"=>"Phòng học trang bị hiện đại rộng rãi","icon"=>"fa-graduation-cap"];
        $data['features'][]=["title"=>"Khóa học","sub_title"=>"Các khóa học tiếng anh, trải nghiệm ngoài chương trình chính","icon"=>"fa-graduation-cap"];
        $data['features'][]=["title"=>"Xe đưa đón","sub_title"=>"Xe đưa đón chất lượng cao","icon"=>"fa-graduation-cap"];
        $data['features'][]=["title"=>"Ngoài giờ","sub_title"=>"Chăm sóc ngoài giờ cho phụ huynh đón muộn","icon"=>"fa-graduation-cap"];
        $data['features'][]=["title"=>"Chi phí linh hoạt","sub_title"=>"Chi phí theo thời gian đến lớp của các con","icon"=>"fa-graduation-cap"];
        }
        if($block_name == 'gallery')
        {
        $data['medias'][]=["src"=>"https://mamnonbanmai.blog/themes/star/images/gallery/g1.jpg"];
        $data['medias'][]=["src"=>"https://mamnonbanmai.blog/themes/star/images/gallery/g2.jpg"];
        $data['medias'][]=["src"=>"https://mamnonbanmai.blog/themes/star/images/gallery/g3.jpg"];
        $data['medias'][]=["src"=>"https://mamnonbanmai.blog/themes/star/images/gallery/g4.jpg"];
        }
        if($block_name == 'enroll')
        {
        $data['title']="Trở thành em bé mầm non ban mai";
        $data['sub_title']="Đăng ký cho con theo học tại mầm non ban mai";
        $data['action']="Đăng Ký";
        }
        if($block_name == 'courses')
        {
        $data['title']="Chương trình học";
        $data['sub_title']="Mầm non ban mai có các chương trình học dành cho mọi lứa tuổi";    
        } 
        if($block_name == 'testimonials')
        {
        $data['title']="Apply Now for your Kids";
        $data['sub_title']="Cupidatat non proident sunt culpa qui officia deserunt mollit anim idest laborum";    
        } 
        if($block_name == 'teachers')
        {
        $data['title']="Giáo viên";
        $data['sub_title']="Các cô giáo tại mầm non ban mai";    
        } 
        if($block_name == 'feature_articles')
        {
        $data['title']="Tin tức ban mai";
        $data['sub_title']="Tin tức, sự kiện, hình ảnh mới từ mầm non ban mai";    
        $data['posts'][]=[1,2,3,4];
        } 
        
        echo json_encode($data);
    }

    public function post($id)
    {
        
        $page_blocks=[];
        $post = DB::table('posts')
        ->leftJoin('users','users.id','posts.user_id')
        ->leftJoin('categories','categories.id','posts.category_id')
        ->where('posts.id', $id)
        ->select('posts.*','users.name as user_name','categories.name as category_name')
        ->first();

       $files = DB::table('files')
        ->join('post_files', 'files.id', '=', 'post_files.file_id')
        ->where('post_files.post_id', $post->id)
        ->select('files.*')
        ->get();
        
        $data['files']=$files;
        $data['post']=$post;
        return view('theme::post', $data);
    }
    private const EVENT_META_KEYS = ['price', 'start_at', 'end_at', 'accept_donation', 'location'];

    private function attachEventMeta($event)
    {
        $meta = DB::table('post_meta')
            ->where('post_id', $event->id)
            ->whereIn('meta_key', self::EVENT_META_KEYS)
            ->pluck('meta_value', 'meta_key');

        foreach (self::EVENT_META_KEYS as $key) {
            $event->{$key} = $meta[$key] ?? null;
        }

        return $event;
    }

    public function event($slug)
    {
        $routing = DB::table('routings')
        ->where('entity', 'posts')
        ->where('slug', $slug)
        ->first();

        $event = $routing ? DB::table('posts')
        ->join('files', 'posts.photo_id',  'files.id')
        ->select('posts.*', 'files.path as feature_path')
        ->where('posts.id', $routing->entity_id)
        ->where('posts.type', 'event')
        ->first() : null;
        $this->attachEventMeta($event);

       $files = DB::table('files')
       ->join('thumbnails', 'thumbnails.file_id',  'files.id')
        ->join('post_files', 'files.id', '=', 'post_files.file_id')
        ->where('post_files.post_id', $event->id)
        ->select('files.*', 'thumbnails.path as thumbnail_path')
        ->get();

        $data['files']=$files;
        $data['event']=$event;
        return view('theme::event', $data);
    }
    public function event_enroll($id)
    {

        $event = DB::table('posts')
        ->join('files', 'posts.photo_id',  'files.id')
        ->select('posts.*', 'files.path as feature_path')
        ->where('posts.id', $id)
        ->where('posts.type', 'event')
        ->first();
        $this->attachEventMeta($event);

       $files = DB::table('files')
       ->join('thumbnails', 'thumbnails.file_id',  'files.id')
        ->join('post_files', 'files.id', '=', 'post_files.file_id')
        ->where('post_files.post_id', $event->id)
        ->select('files.*', 'thumbnails.path as thumbnail_path')
        ->get();

        $students = DB::table('students')
        ->join('files', 'students.photo_id',  'files.id')
        ->join('classes', 'students.class_id',  'classes.id')
        ->select('students.*', 'files.path as photo_path','classes.name as class_name','classes.slug as class_slug')
        ->get();


        $classes = DB::table('classes')
        ->get();
       // print_r($students); exit;

        $data['files']=$files;
        $data['event']=$event;
        $data['students']=$students;
        $data['classes']=$classes;
        return view('theme::event_enroll', $data);
    }
    public function event_student_enroll($id,$student_id)
    {

        $event = DB::table('posts')
        ->join('files', 'posts.photo_id',  'files.id')
        ->select('posts.*', 'files.path as feature_path')
        ->where('posts.id', $id)
        ->where('posts.type', 'event')
        ->first();
        $this->attachEventMeta($event);

       $files = DB::table('files')
       ->join('thumbnails', 'thumbnails.file_id',  'files.id')
        ->join('post_files', 'files.id', '=', 'post_files.file_id')
        ->where('post_files.post_id', $event->id)
        ->select('files.*', 'thumbnails.path as thumbnail_path')
        ->get();



        $student = DB::table('students')
        ->where('students.id', $student_id)
        ->first();

        //add enrollment record
        /*
        DB::table('event_enrollments')->insert([
            'event_id' => $event->id,
            'student_id' => $student->id,
            'school_id' => $this->app['school']->id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        */  

        $data['files']=$files;
        $data['event']=$event;
        $data['student']=$student;
        return view('theme::event_student_enroll', $data); 
    }
    public function posts()
    {
        $categories = DB::table('categories')
        ->where('categories.school_id', $this->app['school']->id)
        ->get();

        $posts = DB::table('posts')
        ->leftJoin('files', 'files.id', '=', 'posts.photo_id')
        ->leftJoin('thumbnails', 'thumbnails.file_id', '=', 'files.id');
            if(request()->get('danh-muc'))
            {
                $category = DB::table('categories')
                ->where('slug', request()->get('danh-muc'))
                ->first();
                if($category)
                {
                    $posts->where('posts.category_id',$category->id);
                }
            }
        $posts->where('posts.type', 'news');
        $posts->whereNull('posts.deleted_at');
        $posts=$posts->select('posts.*',"thumbnails.path as thumbnail_path")
        ->orderBy('created_at','desc')
        ->paginate(10);


        $data['posts']=$posts;
        $data['categories']=$categories;
        return view('theme::posts', $data);
    }
    public function events()
    {
       $posts = DB::table('posts')
        ->join('files', 'files.id', '=', 'posts.photo_id')
        ->join('thumbnails', 'thumbnails.file_id', '=', 'files.id')
        ->where('posts.type', 'event')
        ->whereNull('posts.deleted_at')
        ->select('posts.*',"thumbnails.path as thumbnail_path")
        ->paginate(10);

        foreach ($posts as $post) {
            $this->attachEventMeta($post);
        }

        $data['events']=$posts;
        return view('theme::events', $data);
    }
    public function contact()
    {
        $data=[];
        return view('theme::contact', $data);
    }
    public function enroll($slug = null)
    {
        echo $slug;
        $data=[];
        return view('theme::enroll', $data);
    }
    public function show($slug){
        $routing = DB::table('routings')
        ->where('slug',$slug)
        ->first();
        if($routing->entity =='pages')
            {
                return $this->page($routing->entity_id);
            }
         if($routing->entity =='posts')
            {
                return $this->post($routing->entity_id);
            }
    }
}


